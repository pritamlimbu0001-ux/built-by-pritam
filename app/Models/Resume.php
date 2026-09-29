<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resume extends Model
{
    protected $fillable = [
        'file_path',
        'original_name',
    ];

    /** The CV file must exist on disk for the download link to be shown. */
    public function fileExists(): bool
    {
        return Storage::disk('local')->exists($this->file_path);
    }
}
