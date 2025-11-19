<?php

namespace App\Filament\Resources\TataKebaktianResource\Pages;

use App\Filament\Resources\TataKebaktianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTataKebaktian extends EditRecord
{
    protected static string $resource = TataKebaktianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
