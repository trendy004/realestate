<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'designation', 'gender', 'firstname','lastname','date_of_birth','occupation','address','state','phone',
        'agent_id','referral_code','photo','user_id', 'asset_id', 'asset_description', 'price', 'asset_address'
    ];
    public function Asset(){
        return $this->BelongsToMany('App\Asset');
    }
    public function Maintenance(){
        return $this->hasMany('App\Maintenance');
    }
}
