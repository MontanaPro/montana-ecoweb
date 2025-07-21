<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'category_id',
        'image',
        'title',
        'slug',
        'description',
        'specification',
        'garansi',
        'video',
        'price',
        'weight'
    ];

    //Set Jenis Relation Table
    public function category(): BelongsTo{
        return $this->belongsTo(related: Category::class);
    }

    //Relation To Table Rating
    public function ratings(): HasMany{
        return $this->hasMany(related: Rating::class);
    }

    //method boot untuk slug user friendly url
    protected static function boot()
    {
        parent::boot();

        //generate slug
        static::saving(function ($product)
        {
            if(empty($product->slug)){
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
