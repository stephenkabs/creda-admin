<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketLoanPayment extends Model
{
    protected $fillable = [
        'market_loan_id',
        'amount',
        'paid_at',
        'received_by',
        'slug',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function marketLoan()
    {
        return $this->belongsTo(
            \App\Models\MarketLoan::class,
            'market_loan_id', // FK on this table
            'id'              // PK on market_loans
        );
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}

