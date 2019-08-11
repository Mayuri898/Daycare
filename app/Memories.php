<?php

namespace App;
use App\Memories;
use App\Students;
use Illuminate\Database\Eloquent\Model;

class Memories extends Model {
	public function Students() {
		return $this->belongsTo('App\Students');
	}
}
