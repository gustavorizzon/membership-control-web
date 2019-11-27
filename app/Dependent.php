<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $fillable = ['holder_id', 'dependent_id'];

    /**
     * Returns the holder instance
     * 
     * @return Associate
     */
    public function holder()
    {
        return $this->belongsTo('App\Associate', 'holder_id');
    }

    /**
     * Returns the dependent instance
     * 
     * @return Associate
     */
    public function dependent()
    {
        return $this->belongsTo('App\Associate', 'dependent_id');
    }
}
