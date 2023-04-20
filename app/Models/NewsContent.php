<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsContent extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $table = 'post_contents';

    protected $fillable = [
        'post_id', 'text', 'textRU', 'textTAT', 'img_big', 'img_small_1', 'img_small_2', 'images'
    ];
}
