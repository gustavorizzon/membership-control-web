<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number', 'birth_date',
        'address', 'city', 'state', 'country',
        'drivers_license', 'social_security_number',
        'is_holder', 'is_active'
    ];

    /**
     * Return its dependents
     */
    public function dependents() {
        return $this->hasMany('App\Dependent', 'holder_id');
    }
}
