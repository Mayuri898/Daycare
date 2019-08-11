<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Noticeboard;
use DB;
use Illuminate\Http\Request;

class NoticeboardController extends Controller {
	public function index() {
		$users = DB::select('select * from noticeboards');
		return view('admin/noticeboard/index', ['users' => $users]);
	}

	public function show($id) {

		$user = collect(DB::select('select * from noticeboards where id = ?', [$id]))->first();

		return view('admin/noticeboard/edit', ['user' => $user]);
	}

	public function update(Request $request, $id) {

		// $header = $request->input('header');

		// $noticedescription = $request->input('noticedescription');
		// $todaysdate = $request->input('todaysdate');
		// $writetime = $request->input('writetime');
		// $isUpdated = DB::update('update noticeboards set header = ?,noticedescription=?,todaysdate=?,writetime=? where id = ?',
		// 	[$header, $noticedescription, $todaysdate, $writetime, $id]);

		// $users = DB::select('select * from noticeboards');
		// return view('admin/noticeboard/index', ['users' => $users]);

		$isUpdated = DB::update('update noticeboards set header = ?,noticedescription=?,todaysdate=? ,writetime=? where id = ?',
			[$request->header, $request->noticedescription, $request->todaysdate, $request->writetime, $id]);

		return redirect()->route('admin.noticeboard.index');

	}

	/*public function index() {
		            $arr['teachers'] = Teachers::paginate(5);
		            // dd($arr['categories']);

		            return view('admin/teachers/index')->with($arr);
		        }

		        /**
		         * Show the form for creating a new resource.
		         *
		         * @return \Illuminate\Http\Response
	*/
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Noticeboard $noticeboard) {

		$noticeboard->header = $request->header;
		$noticeboard->noticedescription = $request->noticedescription;
		$noticeboard->todaysdate = $request->todaysdate;
		$noticeboard->writetime = $request->writetime;

		$noticeboard->save();
		return redirect('admin/noticeboard');
	}

	public function destroy($id) {
		DB::delete('delete from noticeboards where id = ?', [$id]);

		// return view('admin/teachers/index');
		return redirect()->route('admin.noticeboard.index');
		//$user->delete();
		//return redirect()->route('admin.teachers.index');
		//
	}
}
