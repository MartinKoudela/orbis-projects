<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Project::published()
            ->with(['taxonomies', 'links', 'media'])
            ->orderBy('sort_order');

        if ($request->has('year')) {
            $query->whereHas('taxonomies', fn ($q) => $q->where('slug', $request->year)->where('type', 'year'));
        }

        if ($request->has('project_type')) {
            $query->whereHas('taxonomies', fn ($q) => $q->where('slug', $request->project_type)->where('type', 'project_type'));
        }

        if ($request->has('work_type')) {
            $query->whereHas('taxonomies', fn ($q) => $q->where('slug', $request->work_type)->where('type', 'work_type'));
        }

        $projects = $query->get()->map(fn ($project) => $this->formatProject($project));

        return response()->json($projects);
    }

    public function show(string $slug): JsonResponse
    {
        $project = Project::published()
            ->with(['taxonomies', 'links', 'media'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($this->formatProject($project));
    }

    private function formatProject(Project $project): array
    {
        $taxonomies = $project->taxonomies->groupBy(fn ($t) => $t->type->value);

        return [
            'id' => $project->id,
            'title' => $project->title,
            'slug' => $project->slug,
            'excerpt' => $project->excerpt,
            'description' => $project->description,
            'thumbnail' => $project->getFirstMediaUrl('thumbnail'),
            'author' => [
                'name' => $project->author_name,
                'class' => $project->author_class,
                'email' => $project->author_email,
            ],
            'school_year' => $project->school_year,
            'year' => $taxonomies->get('year')?->first()?->name,
            'project_type' => $taxonomies->get('project_type')?->first()?->name,
            'work_type' => $taxonomies->get('work_type')?->first()?->name,
            'school_class' => $taxonomies->get('school_class')?->first()?->name,
            'links' => $project->links->map(fn ($l) => [
                'type' => $l->type->value,
                'url' => $l->url,
                'label' => $l->label,
            ]),
            'published_at' => $project->published_at?->toISOString(),
        ];
    }
}
