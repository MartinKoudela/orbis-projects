<?php

namespace Database\Seeders;

use App\Enums\LinkType;
use App\Enums\TaxonomyType;
use App\Models\Project;
use App\Models\Taxonomy;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Space Invaders',
                'excerpt' => 'Retro arkádová hra inspirovaná klasikou z 80. let.',
                'description' => '<p>Hra Space Invaders je moderní remake klasické arkádové hry. Hráč ovládá vesmírnou loď a střílí na nepřátele.</p><p>Projekt byl vytvořen v Unity s využitím C#.</p>',
                'author_name' => 'Jan Novák',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['4.ročník', 'Hra', 'Maturitní práce', 'S4A'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/space-invaders', 'label' => 'Zdrojový kód'],
                    ['type' => LinkType::Website, 'url' => 'https://example.com/space-invaders', 'label' => 'Hrát online'],
                ],
            ],
            [
                'title' => 'Školní docházkový systém',
                'excerpt' => 'Webová aplikace pro evidenci docházky studentů.',
                'description' => '<p>Aplikace umožňuje učitelům zaznamenávat docházku a studentům kontrolovat své absence.</p><p>Postaveno na Laravel + Vue.js.</p>',
                'author_name' => 'Petra Svobodová',
                'author_email' => 'svobodova@orbiszlin.cz',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['2.ročník', 'Web', 'Ročníková práce', 'S2I'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/dochazka', 'label' => 'GitHub'],
                ],
            ],
            [
                'title' => 'Portfolio webu kavárny',
                'excerpt' => 'Responzivní webová prezentace pro místní kavárnu.',
                'description' => '<p>Moderní webová stránka s online menu, galerií a rezervačním systémem.</p>',
                'author_name' => 'Tomáš Dvořák',
                'school_year' => '2024/25',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['1.ročník', 'Web', 'Ročníková práce', 'S1E'],
                'links' => [
                    ['type' => LinkType::Website, 'url' => 'https://example.com/kavarna', 'label' => 'Živá verze'],
                ],
            ],
            [
                'title' => 'Animovaný krátký film',
                'excerpt' => '2D animace o cestě robota městem budoucnosti.',
                'description' => '<p>Krátký animovaný film vytvořený v Adobe After Effects a Illustratoru.</p>',
                'author_name' => 'Lucie Marková',
                'school_year' => '2025/26',
                'is_published' => false,
                'taxonomies' => ['2.ročník', 'Animace', 'Semestrální práce', 'S2G'],
                'links' => [
                    ['type' => LinkType::Video, 'url' => 'https://youtube.com/watch?v=example', 'label' => 'YouTube'],
                ],
            ],
            [
                'title' => 'Fitness tracker',
                'excerpt' => 'Mobilní aplikace pro sledování cvičení a výživy.',
                'description' => '<p>Aplikace pro Android vytvořená v Kotlin. Sleduje kroky, kalorie a nabízí tréninkové plány.</p>',
                'author_name' => 'Martin Kučera',
                'author_email' => 'kucera@orbiszlin.cz',
                'school_year' => '2024/25',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['3.ročník', 'Mobilní aplikace', 'Maturitní práce', 'S3A'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/fitness', 'label' => 'GitHub'],
                    ['type' => LinkType::GooglePlay, 'url' => 'https://play.google.com/store/apps/example', 'label' => 'Google Play'],
                ],
            ],
            [
                'title' => 'Grafický manuál Orbis',
                'excerpt' => 'Kompletní vizuální identita pro fiktivní značku.',
                'description' => '<p>Grafický manuál obsahující logo, typografii, barevnou paletu a ukázky použití.</p>',
                'author_name' => 'Eva Procházková',
                'school_year' => '2023/24',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['4.ročník', 'Grafika', 'Volný projekt', 'S4A'],
                'links' => [],
            ],
            [
                'title' => 'Chytrý termostat',
                'excerpt' => 'Arduino termostat s webovým rozhraním pro ovládání topení.',
                'description' => '<p>IoT projekt využívající Arduino, MQTT broker a webový dashboard. Senzory teploty, grafy a plánování topení.</p>',
                'author_name' => 'Radek Kovář',
                'author_email' => 'kovar@orbiszlin.cz',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['3.ročník', 'IoT', 'Ročníková práce', 'S3A'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/termostat', 'label' => 'GitHub'],
                ],
            ],
            [
                'title' => 'Marketingová kampaň ZOO Zlín',
                'excerpt' => 'Návrh kompletní marketingové kampaně pro zlínskou ZOO.',
                'description' => '<p>Kampaň zahrnuje sociální sítě, plakáty, bannery a video spot. Cílová skupina: rodiny s dětmi.</p>',
                'author_name' => 'Karolína Horáčková',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['3.ročník', 'Marketing', 'Ročníková práce', 'S3B'],
                'links' => [
                    ['type' => LinkType::Video, 'url' => 'https://youtube.com/watch?v=example2', 'label' => 'Video spot'],
                ],
            ],
            [
                'title' => 'Herbář české flóry',
                'excerpt' => 'Interaktivní webová aplikace pro poznávání rostlin.',
                'description' => '<p>Digitální herbář s fotografiemi, popisy a mapou výskytu 200+ rostlin české přírody. Filtrování podle čeledi a stanoviště.</p>',
                'author_name' => 'Anna Zelenková',
                'school_year' => '2024/25',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['2.ročník', 'Biologie', 'Seminární práce', 'S2E'],
                'links' => [
                    ['type' => LinkType::Website, 'url' => 'https://example.com/herbar', 'label' => 'Online herbář'],
                ],
            ],
            [
                'title' => 'Simulace gravitace',
                'excerpt' => 'Vizualizace gravitačních interakcí mezi tělesy.',
                'description' => '<p>Fyzikální simulace v JavaScriptu s Canvas API. Uživatel přidává tělesa a sleduje jejich orbity v reálném čase.</p>',
                'author_name' => 'Filip Král',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['3.ročník', 'Fyzika', 'Ročníková práce', 'S3A'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/gravitace', 'label' => 'GitHub'],
                    ['type' => LinkType::Website, 'url' => 'https://example.com/gravitace', 'label' => 'Spustit simulaci'],
                ],
            ],
            [
                'title' => 'Periodická tabulka prvků',
                'excerpt' => 'Interaktivní periodická tabulka s detaily o každém prvku.',
                'description' => '<p>Webová aplikace zobrazující periodickou tabulku. Kliknutím na prvek se zobrazí jeho vlastnosti, elektronová konfigurace a použití.</p>',
                'author_name' => 'David Veselý',
                'school_year' => '2024/25',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['1.ročník', 'Chemie', 'Seminární práce', 'S1G'],
                'links' => [
                    ['type' => LinkType::Website, 'url' => 'https://example.com/prvky', 'label' => 'Online verze'],
                ],
            ],
            [
                'title' => 'Kvíz z dějepisu',
                'excerpt' => 'Testovací aplikace z českých a světových dějin.',
                'description' => '<p>300+ otázek rozdělených podle epoch. Časomíra, žebříček nejlepších a multiplayer mód.</p>',
                'author_name' => 'Marek Šimánek',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['2.ročník', 'Dějepis', 'Volný projekt', 'S2E'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/dejepis-kviz', 'label' => 'GitHub'],
                ],
            ],
            [
                'title' => 'RPG Dungeon Crawler',
                'excerpt' => 'Textové RPG s procedurálně generovanými dungeony.',
                'description' => '<p>Hra s inventory systémem, úrovněmi postavy a 30+ bossy. Postaveno v čistém JavaScriptu s OOP architekturou.</p>',
                'author_name' => 'Jakub Černý',
                'author_email' => 'cerny@orbiszlin.cz',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['4.ročník', 'Hra', 'Maturitní práce', 'S4A'],
                'links' => [
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/rpg', 'label' => 'Zdrojový kód'],
                    ['type' => LinkType::Website, 'url' => 'https://example.com/rpg', 'label' => 'Hrát online'],
                ],
            ],
            [
                'title' => 'Prezentace — Vývoj počítačů',
                'excerpt' => 'Interaktivní prezentace o historii výpočetní techniky.',
                'description' => '<p>Webová prezentace s animacemi a časovou osou od Babbageova stroje po moderní kvantové počítače.</p>',
                'author_name' => 'Tereza Bílá',
                'school_year' => '2024/25',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['1.ročník', 'Prezentace', 'Semestrální práce', 'S1I'],
                'links' => [
                    ['type' => LinkType::Website, 'url' => 'https://example.com/pocitace', 'label' => 'Zobrazit prezentaci'],
                ],
            ],
            [
                'title' => 'Mapa zajímavostí Zlínského kraje',
                'excerpt' => 'Interaktivní mapa s turistickými cíli a zajímavostmi.',
                'description' => '<p>Webová aplikace s Leaflet mapou, 150+ bodů zájmu, filtrování podle kategorie a vzdálenosti.</p>',
                'author_name' => 'Martina Horáková',
                'school_year' => '2025/26',
                'is_published' => true,
                'published_at' => now(),
                'taxonomies' => ['2.ročník', 'Zeměpis', 'Ročníková práce', 'S2I'],
                'links' => [
                    ['type' => LinkType::Website, 'url' => 'https://example.com/mapa-zlin', 'label' => 'Otevřít mapu'],
                    ['type' => LinkType::GitHub, 'url' => 'https://github.com/example/mapa-zlin', 'label' => 'GitHub'],
                ],
            ],
        ];

        foreach ($projects as $index => $data) {
            $taxonomyNames = $data['taxonomies'];
            $linksData = $data['links'];
            unset($data['taxonomies'], $data['links']);

            $data['sort_order'] = $index;
            $data['slug'] = str($data['title'])->slug();
            $project = Project::firstOrCreate(
                ['slug' => $data['slug']],
                $data,
            );

            $taxonomyIds = Taxonomy::whereIn('name', $taxonomyNames)->pluck('id');
            $project->taxonomies()->attach($taxonomyIds);

            foreach ($linksData as $linkIndex => $link) {
                $project->links()->create([...$link, 'sort_order' => $linkIndex]);
            }
        }
    }
}
