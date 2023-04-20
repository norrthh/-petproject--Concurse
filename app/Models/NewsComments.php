<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'post_id', 'message'
    ];

    public function getUsers()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
