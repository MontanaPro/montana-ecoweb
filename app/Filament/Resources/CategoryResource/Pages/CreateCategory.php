<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Soap\Url;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    //method untuk redirect  to index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
