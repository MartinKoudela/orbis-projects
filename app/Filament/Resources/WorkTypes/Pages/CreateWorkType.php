<?php

namespace App\Filament\Resources\WorkTypes\Pages;

use App\Enums\TaxonomyType;
use App\Filament\Resources\WorkTypes\WorkTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkType extends CreateRecord
{
    protected static string $resource = WorkTypeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = TaxonomyType::WorkType;
        return $data;
    }

}
