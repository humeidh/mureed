<?php
namespace App\Filament\Resources\BookingInquiryResource\Pages;
use App\Filament\Resources\BookingInquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListBookingInquiries extends ListRecords {
    protected static string $resource = BookingInquiryResource::class;
    protected function getHeaderActions(): array { return []; }
}
