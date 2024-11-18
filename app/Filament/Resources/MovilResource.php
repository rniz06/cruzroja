<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovilResource\Pages;
use App\Filament\Resources\MovilResource\RelationManagers;
use App\Models\Movil;
use App\Models\Moviles\Combustible as MovilCombustible;
use App\Models\Moviles\Estado as MovilEstado;
use App\Models\Moviles\Tipo as MovilTipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovilResource extends Resource
{
    protected static ?string $model = Movil::class;

    protected static ?string $navigationLabel = 'Movíles';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationGroup = 'Moviles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('movil_combustible_id')
                            ->label('Tipo Combustible')
                            ->options(MovilCombustible::all()->pluck('tipo_combustible', 'id_movil_combustible'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('movil_estado_id')
                            ->label('Estado')
                            ->options(MovilEstado::all()->pluck('movil_estado', 'id_movil_estado'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('movil_tipo_id')
                            ->label('Tipo de Movil')
                            ->options(MovilTipo::all()->pluck('movil_tipo', 'id_movil_tipo'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->relationship('tipo', 'movil_tipo')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('movil_tipo')->label('Tipo de Movíl:')->required(),
                            ]),
                        Forms\Components\TextInput::make('km_actual')->label('Kilometraje Actual:')->hiddenOn('edit')->required()->numeric()
                    ])->columns(2),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('observaciones')
                            ->label('Observaciones')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo.movil_tipo')->label('Tipo:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('combustible.tipo_combustible')->label('Combustible:')->badge()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('estado.movil_estado')->label('Estado:')->badge()->color(function ($state) {
                    return $state === 'ACTIVO' ? 'success' : 'danger';  // Cambiar el color dependiendo del estado
                })->searchable()->sortable(),
                Tables\Columns\TextColumn::make('km_actual')->label('KM Actual:'),
            ])
            ->filters([
                //
                // FILTRAR POR TIPO DE MOVIL
                Tables\Filters\SelectFilter::make('movil_tipo_id')
                    ->label('Tipo:')
                    ->options(function () {
                        return \App\Models\Moviles\Tipo::pluck('movil_tipo', 'id_movil_tipo')->toArray();
                    })
                    ->multiple(),

                // FILTRAR POR ESTADO DE MOVIL
                Tables\Filters\SelectFilter::make('movil_estado_id')
                    ->label('Estado:')
                    ->options(function () {
                        return \App\Models\Moviles\Estado::pluck('movil_estado', 'id_movil_estado')->toArray();
                    }),

                    // FILTRAR POR TIPO DE COMBUSTIBLE DE MOVIL
                Tables\Filters\SelectFilter::make('movil_combustible_id')
                ->label('Estado:')
                ->options(function () {
                    return \App\Models\Moviles\Combustible::pluck('tipo_combustible', 'id_movil_combustible')->toArray();
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
            ->select('id_movil', 'movil_combustible_id', 'movil_estado_id', 'movil_tipo_id', 'km_actual')
            ->with(['combustible:id_movil_combustible,tipo_combustible', 'estado:id_movil_estado,movil_estado', 'tipo:id_movil_tipo,movil_tipo']);
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
            'index' => Pages\ListMovils::route('/'),
            'create' => Pages\CreateMovil::route('/create'),
            'edit' => Pages\EditMovil::route('/{record}/edit'),
        ];
    }
}
