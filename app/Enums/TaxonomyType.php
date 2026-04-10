<?php

namespace App\Enums;

enum TaxonomyType: string
{
    case YEAR = 'year';
    case PROJECT_TYPE = 'project_type';
    case WORK_TYPE = 'work_type';
    case SCHOOL_CLASS = 'school_class';

    public function label(): string
    {
        return match ($this) {
            self::YEAR => 'Ročník',
            self::PROJECT_TYPE => 'Typ projektu',
            self::WORK_TYPE => 'Typ práce',
            self::SCHOOL_CLASS => 'Třída',
        };
    }
}
