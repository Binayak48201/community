<?php

namespace App\Models;

use App\Notifications\PostWasUpdate;
use App\RecordsActivity;
use App\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, RecordsActivity, Subscription;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $appends = ['path', 'created_date', 'isSubscribedTo', 'isSubscribedCount'];

    /**
     * Boot The Post Modal
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return "/posts/{$this->category->slug}/{$this->slug}";
    }

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }


    /**
     * @param $data
     * @return Model
     */
    public function addReply($data)
    {
        $this->increment('reply_count');

        $reply = $this->reply()->create([
            'user_id' => auth()->id(),
            'body' => $data
        ]);

        foreach ($this->subscriptions as $subscription) {
            $user = User::findOrFail($subscription->user_id);
            if ($reply->user_id != $this->user_id) {
                $user->notify(new PostWasUpdate($this, $reply));
            }
        }
        return $reply;
    }

    /**
     * @return mixed
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function hasUpdatesFor($user)
    {
        $key = sprintf("users.%s.visits.%s", $user->id, $this->id);

        return $this->updated_at > cache($key);
    }
}


