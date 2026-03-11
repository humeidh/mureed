<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationGroup = 'Restaurant';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Item Details')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\Select::make('category')
                    ->options([
                        'breakfast' => 'Breakfast',
                        'lunch' => 'Lunch',
                        'dinner' => 'Dinner',
                    ])->required(),
                Forms\Components\TextInput::make('price')
                    ->required()->numeric()->prefix('$')->minValue(0),
                Forms\Components\Textarea::make('description')->rows(3)->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Display')->schema([
                Forms\Components\TextInput::make('icon')->label('Icon (emoji)')->maxLength(10),
                Forms\Components\TextInput::make('gradient_style')->label('CSS Gradient Style'),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->directory('menu')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_special')->label("Chef's Special"),
                Forms\Components\Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\BadgeColumn::make('category')
                    ->colors([
                        'warning' => 'breakfast',
                        'success' => 'lunch',
                        'primary' => 'dinner',
                    ]),
                Tables\Columns\TextColumn::make('price')->money('USD')->sortable(),
                Tables\Columns\IconColumn::make('is_special')->boolean()->label('Special'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('category')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options(['breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner']),
                Tables\Filters\TernaryFilter::make('is_special'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
