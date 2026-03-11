<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BookingInquiryResource\Pages;
use App\Models\BookingInquiry;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingInquiryResource extends Resource
{
    protected static ?string $model = BookingInquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Inquiries';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Guest Information')->schema([
                Forms\Components\TextInput::make('guest_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                Forms\Components\TextInput::make('phone')->tel()->maxLength(50),
                Forms\Components\TextInput::make('nationality')->maxLength(100),
            ])->columns(2),

            Forms\Components\Section::make('Booking Details')->schema([
                Forms\Components\Select::make('room_id')
                    ->label('Room')
                    ->options(Room::where('is_active', true)->pluck('name', 'id'))
                    ->searchable()
                    ->nullable(),
                Forms\Components\DatePicker::make('check_in')->required()->minDate(now()),
                Forms\Components\DatePicker::make('check_out')->required()->minDate(now()->addDay()),
                Forms\Components\TextInput::make('adults')->numeric()->minValue(1)->default(1)->required(),
                Forms\Components\TextInput::make('children')->numeric()->minValue(0)->default(0),
                Forms\Components\Textarea::make('special_requests')->rows(3)->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Admin')->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])->required(),
                Forms\Components\Textarea::make('admin_notes')->rows(3)->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guest_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('room.name')->label('Room'),
                Tables\Columns\TextColumn::make('check_in')->date()->sortable(),
                Tables\Columns\TextColumn::make('check_out')->date()->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'new',
                        'primary' => 'contacted',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['new'=>'New','contacted'=>'Contacted','confirmed'=>'Confirmed','cancelled'=>'Cancelled']),
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
            'index' => Pages\ListBookingInquiries::route('/'),
            'view' => Pages\ViewBookingInquiry::route('/{record}'),
            'edit' => Pages\EditBookingInquiry::route('/{record}/edit'),
        ];
    }
}
