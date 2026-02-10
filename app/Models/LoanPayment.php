<?php

namespace App\Models;
use App\Models\ApiDoc;
use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    protected $fillable = [
        'loan_id',
        'loan_repayment_schedule_id',
        'amount',
        'interest_paid',
        'principal_paid',
        'comment',
        'paid_at',
        'user_id',
    ];

    protected $casts = [
        'paid_at' => 'date',
    ];

    /* =====================================================
       RELATIONSHIPS
    ===================================================== */

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function schedule()
    {
        return $this->belongsTo(
            LoanRepaymentSchedule::class,
            'loan_repayment_schedule_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //         public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
