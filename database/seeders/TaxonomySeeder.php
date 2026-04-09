<?php

namespace Database\Seeders;

use App\Enums\TaxonomyType;
use App\Models\Taxonomy;
use Illuminate\Database\Seeder;

class TaxonomySeeder extends Seeder
{
    public function run(): void
    {
        $taxonomies = [
            ['type' => TaxonomyType::Year, 'names' => ['1.ročník', '2.ročník', '3.ročník', '4.ročník']],
            ['type' => TaxonomyType::SchoolClass, 'names' => ['S1I', 'S2I', 'S3A', 'S4A', 'S1E', 'S2E', 'S3B', 'S4C', 'S1G', 'S2G', 'S3C']],
            ['type' => TaxonomyType::PROJECT_TYPE, 'names' => [
                'Hra', 'Aplikace', 'Web', 'Animace', 'Grafika', 'IoT', 'Marketing',
                'Plugin', 'AI/ML', 'Prezentace', 'Video', 'Film', 'Dokumentace', 'Hardware']],
            ['type' => TaxonomyType::WorkType, 'names' => ['Maturitní práce', 'Ročníková práce', 'Semestrální práce', 'Volný projekt']],
        ];

        foreach ($taxonomies as $group) {
            foreach ($group['names'] as $index => $name) {
                Taxonomy::firstOrCreate(
                    ['slug' => str($name)->slug(), 'type' => $group['type']],
                    ['name' => $name, 'sort_order' => $index],
                );
            }
        }
    }
}
