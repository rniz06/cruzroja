<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoluntarioResource\Pages;
use App\Filament\Resources\VoluntarioResource\RelationManagers;
use App\Models\Voluntario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VoluntarioResource extends Resource
{
    protected static ?string $model = Voluntario::class;

    protected static ?string $navigationLabel = 'Voluntarios';

    protected static ?string $navigationIcon = 'bxs-user-account';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nombre_completo')->label('Nombre Completo:')->required()->maxLength(100),
                        Forms\Components\TextInput::make('ci')->label('Cedula de Identidad: (* Sin Puntos)')->mask('9999999999')->numeric(),
                        Forms\Components\TextInput::make('direccion')->label('Dirección Particular:'),
                        Forms\Components\TextInput::make('telefono')->label('Teléfono:')->maxLength(15)->numeric(),
                        Forms\Components\Select::make('ciudad_id')->label('Ciudad De Residencia:')->relationship('ciudad', 'ciudad')->preload()->searchable(),
                        Forms\Components\Select::make('estado_id')->label('Estado:')->relationship('estado', 'estado')->preload(),
                        Forms\Components\Select::make('sexo_id')->label('Género:')->relationship('sexo', 'sexo')->preload(),
                        Forms\Components\Toggle::make('es_tem')->label('Es TEM:')
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_completo')->label('Nombre y Apellido:'),
                Tables\Columns\TextColumn::make('ci')->label('CI:'),
                Tables\Columns\TextColumn::make('direccion')->label('Dirección'),
                Tables\Columns\TextColumn::make('telefono')->label('Teléfono:'),
                Tables\Columns\TextColumn::make('ciudad.ciudad')->label('Ciudad:'),
                Tables\Columns\TextColumn::make('estado.estado')->label('Estado:'),
                Tables\Columns\TextColumn::make('sexo.sexo')->label('Sexo:'),
                Tables\Columns\ToggleColumn::make('es_tem')->label('Es TEM:')
            ])->paginated([5, 10, 20, 25])
            ->defaultPaginationPageOption(5)
            ->filters([
                // FILTRAR POR CAMPO NOMBRECOMPLETO
                Tables\Filters\Filter::make('nombre_completo')
                    ->form([
                        Forms\Components\TextInput::make('nombre_completo')->label('Nombre y Apellido:'),
                    ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['nombre_completo'],
                            fn(Builder $query, $nombre_completo): Builder => $query->where('nombre_completo', 'like', '%' . $nombre_completo . '%') // Se agrega la funcion like debido a que el campo es de tipo TEXT
                        );
                    })->columnSpan(1),
                // FILTRAR POR CAMPO CI
                Tables\Filters\Filter::make('ci')
                    ->form([
                        Forms\Components\TextInput::make('ci')->label('Cédula de Identidad:'),
                    ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['ci'],
                            fn(Builder $query, $ci): Builder => $query->where('ci', 'like', '%' . $ci . '%') // Se agrega la funcion like debido a que el campo es de tipo TEXT
                        );
                    })->columnSpan(1),
                // FILTRAR POR CAMPO DIRECCION
                Tables\Filters\Filter::make('direccion')
                    ->form([
                        Forms\Components\TextInput::make('direccion')->label('Dirección:'),
                    ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['direccion'],
                            fn(Builder $query, $direccion): Builder => $query->where('direccion', 'like', '%' . $direccion . '%') // Se agrega la funcion like debido a que el campo es de tipo TEXT
                        );
                    })->columnSpan(1),
                // FILTRAR POR CAMPO TELEFONO
                Tables\Filters\Filter::make('telefono')
                    ->form([
                        Forms\Components\TextInput::make('telefono')->label('Teléfono:'),
                    ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['telefono'],
                            fn(Builder $query, $telefono): Builder => $query->where('telefono', 'like', '%' . $telefono . '%') // Se agrega la funcion like debido a que el campo es de tipo TEXT
                        );
                    })->columnSpan(1),
                // FILTRAR POR CAMPO (RELACION) CIUDAD
                Tables\Filters\SelectFilter::make('ciudad_id')
                    ->label('Ciudad:')
                    ->relationship('ciudad', 'ciudad')
                    ->preload()
                    ->searchable()
                    ->columnSpan(1),
                // FILTRAR POR CAMPO (RELACION) ESTADO
                Tables\Filters\SelectFilter::make('estado_id')
                    ->label('Estado:')
                    ->relationship('estado', 'estado')
                    ->preload()
                    ->columnSpan(1),
                // FILTRAR POR CAMPO (RELACION) SEXO
                Tables\Filters\SelectFilter::make('sexo_id')
                    ->label('Sexo:')
                    ->relationship('sexo', 'sexo')
                    ->preload()
                    ->columnSpan(1),
                Tables\Filters\TernaryFilter::make('es_tem')->label('Es TEM:')
            ], layout: FiltersLayout::AboveContentCollapsible)->filtersFormColumns(8)
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filtros'),
            )
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
            ->select('id_voluntario', 'nombre_completo', 'ci', 'direccion', 'telefono', 'ciudad_id', 'estado_id', 'sexo_id', 'es_tem')
            ->with('ciudad', 'estado', 'sexo')
            ->orderBy('nombre_completo', 'asc');
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
            'index' => Pages\ListVoluntarios::route('/'),
            'create' => Pages\CreateVoluntario::route('/create'),
            'edit' => Pages\EditVoluntario::route('/{record}/edit'),
        ];
    }
}
