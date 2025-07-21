<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'customer_id',
        'province_id',
        'city_name',
        'district_name',
        'subdistrict_name',
        'zip_code',
        'full_address',
        'invoice',
        'weight',
        'total',
        'status',
        'snap_token'
    ];

    //Jenis Relation
    public function TransactionDetails(): HasMany{
        return $this->hasMany(related:TransactionDetail::class);
    }

    //Relation To Tabel Shipping
    public function shipping(): HasOne{
        return $this->hasOne(related:Shipping::class);
    }

    //Relation To Tabel Customer
    public function customer(): BelongsTo{
        return $this->belongsTo(related:Customer::class);
    }
}
