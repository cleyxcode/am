<?php

namespace App\Filament\Resources\InformasiAMResource\Pages;

use App\Filament\Resources\InformasiAMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiAMS extends ListRecords
{
    protected static string $resource = InformasiAMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
