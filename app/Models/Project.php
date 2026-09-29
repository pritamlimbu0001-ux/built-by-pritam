<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'technologies',
        'github_url',
        'live_url',
        'image',
        'featured',
        'published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'published' => 'boolean',
        ];
    }

    /** Comma-separated technologies as an array for Blade. */
    public function getTechnologiesArrayAttribute(): array
    {
        return array_filter(array_map('trim', explode(',', (string) $this->technologies)));
    }

    /** Only what the public site may show. */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
