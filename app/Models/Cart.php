<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'customer_id',
        'product_id',
        'qty'
    ];

    //Relation To Tabel Product
    public function product(): BelongsTo{
        return $this->belongsTo(related: Product::class);
    }

    //Relation To Tabel Customer
    public function customer(): BelongsTo{
        return $this->belongsTo(related: Customer::class);
    }
}
