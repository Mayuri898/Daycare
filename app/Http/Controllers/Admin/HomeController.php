<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$data['events'] = DB::select('select * from events');
		// dd($data);
		$data['notice'] = DB::select('select * from noticeboards');

		return view('admin/index')->with($data);
	}
}
