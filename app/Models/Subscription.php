<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

        protected $fillable = [
        'organization_id','package_id','starts_at','ends_at','status'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
