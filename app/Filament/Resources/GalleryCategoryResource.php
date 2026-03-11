<?php
namespace App\Filament\Resources;

use App\Filament\Resources\GalleryCategoryResource\Pages;
use App\Models\GalleryCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GalleryCategoryResource extends Resource
{
    protected static ?string $model = GalleryCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Gallery';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
            Forms\Components\TextInput::make('slug')
                ->required()->maxLength(255)->unique(ignoreRecord: true),
            Forms\Components\Select::make('page_placement')
                ->options([
                    'home' => 'Home Page',
                    'gallery' => 'Gallery Page',
                    'rooms' => 'Rooms Page',
                    'restaurant' => 'Restaurant Page',
                    'about' => 'About Page',
                ])->required(),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->default(true),

            Forms\Components\Section::make('Images')->schema([
                Forms\Components\Repeater::make('images')
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Image')
                            ->image()
                            ->directory('gallery')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120)
                            ->required(),
                        Forms\Components\TextInput::make('caption')->maxLength(255),
                        Forms\Components\TextInput::make('alt_text')->maxLength(255),
                        Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                        Forms\Components\Toggle::make('is_active')->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\BadgeColumn::make('page_placement'),
                Tables\Columns\TextColumn::make('images_count')
                    ->counts('images')->label('Images'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListGalleryCategories::route('/'),
            'create' => Pages\CreateGalleryCategory::route('/create'),
            'edit' => Pages\EditGalleryCategory::route('/{record}/edit'),
        ];
    }
}
