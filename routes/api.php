<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaxonomyController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
Route::get('/taxonomies', [TaxonomyController::class, 'index']);

Route::get('/themes', function () {
    $themes = collect(glob(public_path('themes/*'), GLOB_ONLYDIR))
        ->map(function ($path) {
            $author = basename($path);
            $year = basename(dirname($path));
            $metaFile = $path . '/meta.json';
            $meta = file_exists($metaFile) ? json_decode(file_get_contents($metaFile), true) : [];

            return [
                'year' => $meta['year'] ?? $year,
                'author' => $meta['author'] ?? $author,
                'slug' => $author,
                'path' => '/themes/' . $year . '/' . $author . '/index.blade.php',
            ];
        })
        ->sortBy(['year', 'author'])
        ->values();

    return response()->json([
        'active' => config('app.active_theme', date('Y')) . '/' . config('app.active_author', ''),
        'themes' => $themes,
    ]);
});
