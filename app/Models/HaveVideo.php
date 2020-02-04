<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class HaveVideo extends Model
{
    use Taggable;

    protected $guarded = [];

}
