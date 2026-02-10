<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
        protected $fillable = [
        'name','price','max_users','max_borrowers','sms_limit','api_access','active'
    ];


    public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}

}
