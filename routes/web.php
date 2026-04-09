<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $author = config('app.active_author', '');

    $projects = Http::get(url('/api/projects'), $request->query())->json();

    $taxonomies = collect(Http::get(url('/api/taxonomies'))->json())
        ->groupBy('type')
        ->toArray();

    return view("themes.{$author}.index", compact('projects', 'taxonomies'));
});

Route::get('/themes/{author}', function (Request $request, string $author) {
    $projects = Http::get(url('/api/projects'), $request->query())->json();

    $taxonomies = collect(Http::get(url('/api/taxonomies'))->json())
        ->groupBy('type')
        ->toArray();

    return view("themes.{$author}.index", compact('projects', 'taxonomies'));
});

Route::get('/themes/{author}/project/{slug}', function (Request $request, string $author, string $slug) {
    $project = Http::get(url('/api/projects/' . $slug))->json();

    return view("themes.{$author}.detail", compact('project'));
});
