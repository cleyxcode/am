<?php

namespace App\Filament\Resources\TataKebaktianResource\Pages;

use App\Filament\Resources\TataKebaktianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTataKebaktians extends ListRecords
{
    protected static string $resource = TataKebaktianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
