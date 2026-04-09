<?php

namespace App\Models;

use App\Enums\TaxonomyType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable(['name', 'slug', 'type', 'sort_order', 'parent_id'])]
class Taxonomy extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_taxonomy');
    }

    protected function casts(): array
    {
        return [
            'type' => TaxonomyType::class,
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Taxonomy::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Taxonomy::class, 'parent_id');
    }

    protected static function booted(): void
    {
        static::creating(function (Taxonomy $taxonomy) {
            if (! $taxonomy->sort_order) {
                $taxonomy->sort_order = (Taxonomy::max('sort_order') ?? 0) + 1;
            }
        });
    }
}
