<?php
namespace App\Filament\Resources;

use App\Filament\Resources\AboutSectionResource\Pages;
use App\Models\AboutSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutSectionResource extends Resource
{
    protected static ?string $model = AboutSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('section_key')
                ->label('Section Key (unique identifier)')
                ->required()->maxLength(100)
                ->unique(ignoreRecord: true)
                ->helperText('e.g. story, philosophy, mission, vision'),
            Forms\Components\TextInput::make('title')->required()->maxLength(255),
            Forms\Components\RichEditor::make('content')
                ->required()->columnSpanFull(),
            Forms\Components\FileUpload::make('image_path')
                ->label('Image')
                ->image()
                ->directory('about')
                ->visibility('public')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(5120),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->default(true),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
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
            'index' => Pages\ListAboutSections::route('/'),
            'create' => Pages\CreateAboutSection::route('/create'),
            'edit' => Pages\EditAboutSection::route('/{record}/edit'),
        ];
    }
}
