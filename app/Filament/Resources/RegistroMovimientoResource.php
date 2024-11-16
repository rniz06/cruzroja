<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroMovimientoResource\Pages;
use App\Filament\Resources\RegistroMovimientoResource\RelationManagers;
use App\Models\Ciudad;
use App\Models\Conductor;
use App\Models\Movil;
use App\Models\RegistroMovimiento;
use App\Models\Servicio;
use App\Models\ServicioClasificacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroMovimientoResource extends Resource
{
    protected static ?string $model = RegistroMovimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('conductor_id')
                            ->label('Conductor:')
                            ->options(Conductor::all()->pluck('nombre_completo', 'id_conductor'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('movil_id')
                            ->label('Movil:')
                            ->options(Movil::all()->pluck('movil_tipo_id', 'id_movil'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('ciudad_id')
                            ->label('Ciudad:')
                            ->options(Ciudad::all()->pluck('ciudad', 'id_ciudad'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('servicio_id')
                            ->label('Servicio:')
                            ->options(Servicio::all()->pluck('servicio', 'id_servicio'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('clasificacion_servicio_id')
                            ->label('Clasificación:')
                            ->options(ServicioClasificacion::all()->pluck('servicio_clasificacion', 'id_servicio_clasificacion'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('destino')->label('Destino:')->required(),
                    ])->columns(3),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('fecha_hora_salida')->label('Hora Salida:')->required(),
                        Forms\Components\TextInput::make('km_inicial')->label('Km Inicial:')->numeric()->required(),
                        Forms\Components\TextInput::make('a_cargo')->label('A Cargo:')->required(),
                        Forms\Components\DateTimePicker::make('fecha_hora_llegada')->label('Hora Llegada')->required(),
                        Forms\Components\TextInput::make('km_final')->label('Km Final:')->numeric()->required(),

                        Forms\Components\Textarea::make('observaciones')->label('Observaciones')->columnSpan(3)
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('conductor.nombre_completo')->label('Conductor:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('movil.tipo.movil_tipo')->label('Movil:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('ciudad.ciudad')->label('Ciudad:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('servicio.servicio')->label('Servicio:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('servicioClasificacion.servicio_clasificacion')->label('Clasificación:')->searchable()->sortable()->badge()->color('success'),
                Tables\Columns\TextColumn::make('fecha_hora_salida')->label('Salida:')->dateTime()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('km_inicial')->label('Km Inicial:')->searchable()->sortable()->badge()->numeric(),
                Tables\Columns\TextColumn::make('destino')->label('Destino:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('a_cargo')->label('A Cargo:')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('fecha_hora_llegada')->label('Llegada:')->dateTime()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('km_final')->label('Km Final:')->searchable()->sortable()->badge()->numeric(),
                Tables\Columns\TextColumn::make('km_recorrido')->label('Recorrido:')->searchable()->sortable()->badge()->numeric(),
            ])
            ->filters([
                //
                // FILTRAR POR CONDUCTOR
                Tables\Filters\SelectFilter::make('conductor_id')
                    ->label('Conductor:')
                    ->options(function () {
                        return \App\Models\Conductor::pluck('nombre_completo', 'id_conductor')->toArray();
                    })->searchable(),

                // FILTRAR POR CIUDAD
                Tables\Filters\SelectFilter::make('ciudad_id')
                    ->label('Ciudad:')
                    ->options(function () {
                        return \App\Models\Ciudad::pluck('ciudad', 'id_ciudad')->toArray();
                    })->searchable(),

                    // FILTRAR POR SERVICIO
                Tables\Filters\SelectFilter::make('servicio_id')
                ->label('Servicio:')
                ->options(function () {
                    return \App\Models\Servicio::pluck('servicio', 'id_servicio')->toArray();
                })->searchable(),

                // FILTRAR POR CLASIFICACION
                Tables\Filters\SelectFilter::make('clasificacion_servicio_id')
                    ->label('Clasificación:')
                    ->options(function () {
                        return \App\Models\ServicioClasificacion::pluck('servicio_clasificacion', 'id_servicio_clasificacion')->toArray();
                    })->searchable(),
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
            ->select(
                'id_registro_movimiento',
                'conductor_id',
                'movil_id',
                'ciudad_id',
                'servicio_id',
                'clasificacion_servicio_id',
                'fecha_hora_salida',
                'km_inicial',
                'destino',
                'a_cargo',
                'fecha_hora_llegada',
                'km_final',
                'km_recorrido'
            )
            ->with([
                'conductor:id_conductor,nombre_completo',
                'movil:id_movil,movil_tipo_id',
                'ciudad:id_ciudad,ciudad',
                'servicio:id_servicio,servicio',
                'servicioClasificacion:id_servicio_clasificacion,servicio_clasificacion',
            ]);
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
            'index' => Pages\ListRegistroMovimientos::route('/'),
            'create' => Pages\CreateRegistroMovimiento::route('/create'),
            'edit' => Pages\EditRegistroMovimiento::route('/{record}/edit'),
        ];
    }
}
