<?php

namespace App\Models;

use App\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory,RecordsActivity;

    /**
     * @var array
     */
    protected $guarded = [];


    /**
     * Boot The Post Modal
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });

        static::addGlobalScope('replyCount', function ($post) {
            $post->withCount('reply');
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
        // return $this->hasMany(Reply::class)->withCount('favorites');
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
    public function path()
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
<<<<<<< HEAD
        $this->reply()->create([
=======
         $this->reply()->create([
>>>>>>> 3c8009a2ca553d612fde8770e4899a9fa2523fdd
            'user_id' => auth()->id(),
            'body' => $data
        ]);
    }
}


