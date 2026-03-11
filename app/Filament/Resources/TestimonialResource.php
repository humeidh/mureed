<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('guest_name')->required()->maxLength(255),
            Forms\Components\TextInput::make('guest_title')
                ->label('Title / Occupation')->maxLength(255),
            Forms\Components\TextInput::make('avatar_gradient')
                ->label('Avatar CSS Gradient')
                ->placeholder('linear-gradient(45deg, #667eea, #764ba2)')
                ->maxLength(255),
            Forms\Components\Select::make('rating')
                ->options([1=>1, 2=>2, 3=>3, 4=>4, 5=>5])
                ->default(5)->required(),
            Forms\Components\Textarea::make('content')
                ->required()->rows(5)->columnSpanFull(),
            Forms\Components\TextInput::make('source_url')
                ->label('Source URL (TripAdvisor / Google / Booking.com)')
                ->url()->maxLength(500),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            Forms\Components\Toggle::make('is_published')->default(true),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guest_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('guest_title'),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\IconColumn::make('is_published')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published'),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
