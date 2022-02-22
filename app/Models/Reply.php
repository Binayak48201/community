<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

//    protected $with = ['favorites'];

    protected $appends = ['isFavorited'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favourite::class, 'favorited');
    }

    /**
     * Favourite any modal
     */
    public function favorite()
    {
        $userId = ['user_id' => auth()->id()];
        if (!$this->favorites()->where($userId)->exists()) {
            $this->favorites()->create($userId);
        }
    }

    public function isFavorited()
    {
        return ! ! $this->favorites()->where(['user_id' => auth()->id()])->count();
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
}

