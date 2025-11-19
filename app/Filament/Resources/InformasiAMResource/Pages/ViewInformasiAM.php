<?php

namespace App\Filament\Resources\InformasiAMResource\Pages;

use App\Filament\Resources\InformasiAMResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInformasiAM extends ViewRecord
{
    protected static string $resource = InformasiAMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
