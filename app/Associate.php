<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    public function dependents()
    {
        return $this->hasMany('App\Dependent', 'holder_id');
    }
}
