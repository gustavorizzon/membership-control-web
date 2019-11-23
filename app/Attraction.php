<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = ['name', 'description', 'attraction_type_id'];

    public function type() {
        return $this->belongsTo('App\AttractionType', 'attraction_type_id');
    }
}
