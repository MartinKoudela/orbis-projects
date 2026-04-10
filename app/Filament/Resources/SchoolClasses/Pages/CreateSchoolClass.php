<?php

namespace App\Filament\Resources\SchoolClasses\Pages;

use App\Enums\TaxonomyType;
use App\Filament\Resources\SchoolClasses\SchoolClassResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolClass extends CreateRecord
{
    protected static string $resource = SchoolClassResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = TaxonomyType::SCHOOL_CLASS;
        return $data;
    }

}
