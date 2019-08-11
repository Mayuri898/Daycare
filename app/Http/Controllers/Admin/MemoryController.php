<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoryController extends Controller {
	//to store data
	public function store(Request $request) {
		dd($request->all());
	}
}
