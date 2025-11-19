<?php

namespace App\Filament\Resources\InformasiAMResource\Pages;

use App\Filament\Resources\InformasiAMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiAM extends EditRecord
{
    protected static string $resource = InformasiAMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
