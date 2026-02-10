<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'organization_id',
        'branch_id',
        'expense_category_id',
        'expense_date',
        'amount',
            'expense_month',
        'description',
        'created_by'
    ];


    protected static function booted()
{
    static::saving(function ($expense) {
        if ($expense->expense_date) {
            $expense->expense_month =
                \Carbon\Carbon::parse($expense->expense_date)->month;
        }
    });
}


    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
