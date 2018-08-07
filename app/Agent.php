<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'date_of_birth','gender','company_name','company_address','phone','bank_name','bank_account','account_name', 'user_id'
    ];
}
