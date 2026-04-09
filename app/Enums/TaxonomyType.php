<?php

namespace App\Enums;

enum TaxonomyType: string
{
    case Year = 'year';
    case PROJECT_TYPE = 'project_type';
    case WorkType = 'work_type';
    case SchoolClass = 'school_class';

    public function label(): string
    {
        return match ($this) {
            self::Year => 'Ročník',
            self::PROJECT_TYPE => 'Typ projektu',
            self::WorkType => 'Typ práce',
            self::SchoolClass => 'Třída',
        };
    }
}
