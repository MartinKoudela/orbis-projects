<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Taxonomy;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Celkem projektů', Project::count())
                ->icon('heroicon-o-academic-cap'),
            Stat::make('Publikované', Project::where('is_published', true)->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Nepublikované', Project::where('is_published', false)->count())
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
            Stat::make('Taxonomií', Taxonomy::count())
                ->icon('heroicon-o-tag'),
        ];
    }
}
