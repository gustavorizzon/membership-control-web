<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	protected $fillable = [
		'name', 'description', 'capacity',
		'latitude', 'longitude', 'place_type_id'
	];

	public function type() {
		return $this->belongsTo('App\PlaceType', 'place_type_id');
	}
}
