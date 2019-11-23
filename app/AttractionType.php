<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionType extends Model
{
    protected $fillable = ['name', 'description'];

    public function attractions() {
        return $this->hasMany('App\Attraction');
    }
}
