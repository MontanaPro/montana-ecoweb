<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'customer_id',
        'product_id',
        'transaction_detail_id',
        'rating',
        'review'
    ];

    //Relation To Tabel Customer
    public function customer(): BelongsTo{
        return $this->belongsTo(related: Customer::class);
    }

}
