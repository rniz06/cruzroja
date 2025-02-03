<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuardiaResource\Pages;
use App\Filament\Resources\GuardiaResource\RelationManagers;
use App\Models\Guardia;
use App\Models\Guardia\Item;
use App\Models\Vistas\MovilesVista;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuardiaResource extends Resource
{
    protected static ?string $model = Guardia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // Obtenemos todos los items disponibles
        $items = Item::all();

        $itemFields = [];
        
        foreach ($items as $item) {
            $itemFields[] = Forms\Components\Select::make("itemControles.{$item->id_guardia_item}.verificacion")
                ->label($item->item)
                ->options([
                    'Si' => 'Si',
                    'No' => 'No',
                    'Bajo' => 'Bajo',
                    'Normal' => 'Normal',
                    'Falta' => 'Falta',
                    'Dañado' => 'Dañado',
                    'En Llanta' => 'En Llanta',
                ])
                ->default('Si')
                ->reactive()
                ->columnSpan(1);
        }

        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('fecha_hora')
                            ->required(),
                        Forms\Components\TextInput::make('grupo')
                            ->maxLength(50),
                        Forms\Components\Select::make('tipo_servicio_id')
                            ->label('Tipo de Servicio')
                            ->relationship('tipoServicio', 'tipo_servicio')
                            ->preload()->live(onBlur: false),
                        Forms\Components\Select::make('a_cargo_id')
                            ->label('A Cargo del Movil')
                            ->relationship('aCargo', 'nombre_completo')
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('vol_rea_rev_id')
                            ->label('Personal Que Realizo la Revisión')
                            ->relationship('VoluntarioRevision', 'nombre_completo')
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('movil_id')
                            ->label('Movil')
                            ->options(
                                MovilesVista::all()
                                    ->where('movil_estado', 'ACTIVO')
                                    ->mapWithKeys(fn($movil) => [
                                        $movil->id_movil => "{$movil->movil_tipo} - {$movil->movil_nro_chapa}"
                                    ])
                            )
                            ->preload(),
                        Forms\Components\TextInput::make('tipo_servicio_aclaracion')
                            ->visible(function (Forms\Get $get) {
                                return $get('tipo_servicio_id') == 4; // Visible cuando tipo_servicio_id es igual a 4 Otros
                            })
                            ->required()
                            ->label('Tipo De Servicio Aclaracion')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('km_inicial')
                            ->numeric()
                            ->mask(9999999999),
                        Forms\Components\TextInput::make('km_final')
                            ->numeric()
                            ->mask(9999999999),
                        Forms\Components\Toggle::make('carga_combustible')->live(onBlur: false),
                        Forms\Components\TextInput::make('monto')
                            ->numeric()
                            ->mask(9999999999)
                            ->visible(function (Forms\Get $get) {
                                return $get('carga_combustible') == 1; // Visible cuando tipo_servicio_id es igual a 4 Otros
                            })->suffix('GS'),
                    ])->columns(3),

                // Una única card para todos los items
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(4)
                            ->schema($itemFields)
                    ])
                    ->columnSpan('full')
                    ->heading('Items de Control'),
                    Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('observaciones'),                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_hora')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('grupo'),
                Tables\Columns\TextColumn::make('tipoServicio.tipo_servicio'),
                Tables\Columns\TextColumn::make('km_inicial'),
                Tables\Columns\TextColumn::make('km_final'),
                Tables\Columns\BooleanColumn::make('carga_combustible'),
                Tables\Columns\TextColumn::make('monto'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGuardias::route('/'),
            'create' => Pages\CreateGuardia::route('/create'),
            'view' => Pages\ViewGuardia::route('/{record}'),
            'edit' => Pages\EditGuardia::route('/{record}/edit'),
        ];
    }
}
