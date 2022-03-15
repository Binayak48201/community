<?php

namespace App\Models;

use App\RecordsActivity;
use App\Favourable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory, RecordsActivity, Favourable;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $with = ['favorites', 'user'];

    /**
     * @var string[]
     */
    protected $appends = ['isFavorited', 'favoritesCount', 'created_date'];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($reply) {
            $reply->post()->increment('reply_count');
        });

        static::deleting(function ($reply) {
            $reply->post()->decrement('reply_count');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->post->path . "#reply-{$this->id}";
    }

}
