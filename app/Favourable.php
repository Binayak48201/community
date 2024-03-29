<?php


namespace App;


use App\Models\Favourite;

trait Favourable
{
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

    /**
     * Favourite any modal
     */
    public function unfavourite()
    {
        $userId = ['user_id' => auth()->id()];

        $this->favorites()->where($userId)->delete();
    }

    /**
     * @return bool
     */
    public function isFavorited()
    {
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    /**
     * @return bool
     */
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    /**
     * @return mixed
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
