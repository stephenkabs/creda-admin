<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
     use HasFactory;



     protected $fillable = [
        'organization_id',
        'name',
        'code',
        'location',
        'manager_id',
        'is_active',
    ];

    /* ============================
       RELATIONSHIPS
    ============================ */

    // Branch manager (User)
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    // App\Models\Branch.php
public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}


public function salaryLoans()
{
    return $this->hasMany(SalaryLoan::class);
}





       public function organization()
    {
        return $this->belongsTo(Organization::class);
    }


    // Users in this branch
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Loans in this branch
    // public function loans()
    // {
    //     return $this->hasMany(Loan::class);
    // }

}
