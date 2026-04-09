<?php

namespace App\Filament\Widgets;

use App\Enums\TaxonomyType;
use App\Models\Taxonomy;
use Filament\Widgets\ChartWidget;

class ProjectsByType extends ChartWidget
{
    protected ?string $heading = 'Projekty podle typu';

    protected function getData(): array
    {
        $types = Taxonomy::where('type', TaxonomyType::PROJECT_TYPE)
            ->withCount('projects')
            ->orderBy('name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Počet projektů',
                    'data' => $types->pluck('projects_count')->toArray(),
                    'backgroundColor' => ['#e31e24', '#01a0e2', '#f0801a', '#383084', '#2e7d32', '#6a60ca'],
                ],
            ],
            'labels' => $types->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
