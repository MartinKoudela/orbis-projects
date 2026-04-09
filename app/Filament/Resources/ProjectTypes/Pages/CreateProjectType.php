<?php

namespace App\Filament\Resources\ProjectTypes\Pages;

use App\Enums\TaxonomyType;
use App\Filament\Resources\ProjectTypes\ProjectTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectType extends CreateRecord
{
    protected static string $resource = ProjectTypeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = TaxonomyType::PROJECT_TYPE;
        return $data;
    }

}
