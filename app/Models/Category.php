<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Category extends Model
{
    use RefreshDatabase;
    use HasFactory;

    /**
     * @var array
     */
    // protected $guarded = [];
    protected $fillable = [
        'title',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }
}
