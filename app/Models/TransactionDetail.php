<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'transaction_id',
        'product_id',
        'qty',
        'price'
    ];

    //Relation To Tabel Product
    public function product(): BelongsTo{
        return $this->belongsTo(related: Product::class);
    }
}
