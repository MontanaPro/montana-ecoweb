<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'image',
        'name',
        'slug'
    ];

    //set eloquent relationship
    public function products():HasMany{
        return $this->hasMany(related: Product::class);
    }

    //method boot untuk slug user friendly url
    protected static function boot()
    {
        parent::boot();

        //generate slug
        static::saving(function ($category)
        {
            if(empty($category->slug)){
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
