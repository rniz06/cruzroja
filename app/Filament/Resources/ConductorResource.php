<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConductorResource\Pages;
use App\Filament\Resources\ConductorResource\RelationManagers;
use App\Models\Conductor;
use App\Models\Conductor\Estado as ConductorEstado;
use App\Models\Conductor\Licencia as ConductorLicencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConductorResource extends Resource
{
    protected static ?string $model = Conductor::class;

    protected static ?string $navigationLabel = 'Conductores';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationGroup = 'Conductores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nombres')->label('Nombres:')->placeholder('Ej: Juan Alejandro')->required(),
                        Forms\Components\TextInput::make('apellidos')->label('Apellidos:')->placeholder('Ej: Perez Martinez')->required(),
                        Forms\Components\TextInput::make('ci_conductor')->label('CI Conductor:')->placeholder('Ej: 1234567 (* Sin puntos ni comas.)')->numeric()->required(),
                        Forms\Components\Select::make('conductor_estado_id')
                            ->label('Estado')
                            ->options(ConductorEstado::all()->pluck('estado', 'id_conductor_estado'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('conductor_licencia_id')
                            ->label('Licencia')
                            ->options(ConductorLicencia::all()->pluck('clase', 'id_conductor_licencia'))
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_completo')->label('Nombre:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('ci_conductor')->label('CI:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('estado.estado')->label('Estado:')->badge()->color(function ($state) {
                    return $state === 'ACTIVO' ? 'success' : 'danger';  // Cambiar el color dependiendo del estado
                })->searchable()->sortable(),
                Tables\Columns\TextColumn::make('licencia.clase')->label('Licencia:')->badge()->searchable()->sortable(),
            ])
            ->filters([
                //
                // FILTRAR POR ESTADO DEL CONDUCTOR
                Tables\Filters\SelectFilter::make('conductor_estado_id')
                    ->label('Estado:')
                    ->options(function () {
                        return \App\Models\Conductor\Estado::pluck('estado', 'id_conductor_estado')->toArray();
                    }),

                    // FILTRAR POR TIPO DE LICENCIA DEL CONDUCTOR
                Tables\Filters\SelectFilter::make('conductor_licencia_id')
                ->label('Tipo de Licencia:')
                ->options(function () {
                    return \App\Models\Conductor\Licencia::pluck('clase', 'id_conductor_licencia')->toArray();
                })
                ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->select('id_conductor', 'nombre_completo', 'ci_conductor', 'conductor_estado_id', 'conductor_licencia_id')
            ->with(['estado:id_conductor_estado,estado', 'licencia:id_conductor_licencia,clase']);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConductors::route('/'),
            'create' => Pages\CreateConductor::route('/create'),
            'edit' => Pages\EditConductor::route('/{record}/edit'),
        ];
    }
}
