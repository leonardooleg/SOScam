<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class SearchVideo extends Model
{
    use Taggable;

    protected $guarded = [];
}
