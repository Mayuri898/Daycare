<?php
namespace App;

use App\Memories;
use App\Students;
use App\Teachers;
use Illuminate\Database\Eloquent\Model;

class Students extends Model {
	public function Teachers() {
		return $this->belongsTo('App\Teachers');
	}
	public function memories() {

		return $this->hasMany('App\Memories');
	}
}
