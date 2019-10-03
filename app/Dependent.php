<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    /**
     * Returns the holder instance
     * 
     * @return Associate
     */
    public function holder()
    {
        return $this->hasOne('App\Associate', 'holder_id');
    }

    /**
     * Returns the dependent instance
     * 
     * @return Associate
     */
    public function dependent()
    {
        return $this->hasOne('App\Associate', 'dependent_id');
    }
}
