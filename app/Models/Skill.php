<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public const CATEGORIES = ['Frontend', 'Backend', 'Database', 'Tools', 'Other'];

    protected $fillable = [
        'name',
        'category',
        'level',
        'sort_order',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
