<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaLib extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'have_videos_id', 'kind', 'link', 'media', 'head', 'published', 'created_at', 'updated_at'
    ];
}
