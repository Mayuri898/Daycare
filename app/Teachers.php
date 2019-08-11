<?php

namespace App;
use App\Students;
use App\Teachers;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model {
	public function students() {

		return $this->hasMany('App\Students');
	}
}
