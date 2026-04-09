<?php

namespace App\Filament\Widgets;

use App\Enums\TaxonomyType;
use App\Models\Taxonomy;
use Filament\Widgets\ChartWidget;

class ProjectsByClass extends ChartWidget
{
    protected ?string $heading = 'Projekty Podle Třídy';

    protected function getData(): array
    {
        $classes = Taxonomy::where('type', TaxonomyType::SchoolClass)
            ->withCount('projects')
            ->orderBy('name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Počet projektů',
                    'data' => $classes->pluck('projects_count')->toArray(),
                    'backgroundColor' => '#e31e24',
                ],
            ],
            'labels' => $classes->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
