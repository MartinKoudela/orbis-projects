<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Taxonomy::orderBy('sort_order');

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $taxonomies = $query->get()->map(fn ($t) => [
            'id' => $t->id,
            'name' => $t->name,
            'slug' => $t->slug,
            'type' => $t->type->value,
        ]);

        return response()->json($taxonomies);
    }
}
