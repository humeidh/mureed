<?php
namespace App\Filament\Resources\BookingInquiryResource\Pages;
use App\Filament\Resources\BookingInquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditBookingInquiry extends EditRecord {
    protected static string $resource = BookingInquiryResource::class;
    protected function getHeaderActions(): array { return [Actions\DeleteAction::make()]; }
}
