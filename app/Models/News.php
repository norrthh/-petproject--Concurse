<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'district_id', 'name', 'author', 'nameTAT', 'nameRU'
    ];

    public function getContent(): HasOne
    {
        return $this->hasOne(NewsContent::class, 'post_id');
    }

    public function getDistrict(): BelongsTo
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }
}
