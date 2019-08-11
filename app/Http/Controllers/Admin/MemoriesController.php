<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Memories;
use DB;
use Illuminate\Http\Request;

class MemoriesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['memories'] = DB::select('select * from memories')->orderBy('id', 'DESC')->get();
		// dd($data);

		return view('admin/teachers/dailystudentreport')->with($data);
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
	public function store(Request $request, Memories $memories) {

		if ($request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('public/memories', $file);
		} else {
			$file = '';
		}
		$memories->image = $file;
		$memories->header = $request->header;
		$memories->memoriesdate = $request->memoriesdate;
		$memories->description = $request->description;
		$memories->student_id = $request->student_id;

		$memories->save();

		return redirect()->back();

		// return redirect('admin/teachers/dailystudentreport/1');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$data["memory"] = collect(DB::select('select * from memories where id = ?', [$id]))->first();

		return view('admin/teachers/edit-memory')->with($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id, Memories $memories) {
		if ($request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('public/memories', $file);
		} else {
			$file = '';
		}
		$memories->image = $file;

		$isUpdated = DB::update('update memories set header = ?,description=?,memoriesdate=? ,image=? where id = ?',
			[$request->header, $request->description, $request->memoriesdate, $memories->image, $id]);

		return redirect('admin/dailystudentreport/' . $request->student_id);

		// return redirect('admin/teachers/dailystudentreport/1');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$isMemoryDeleted = DB::delete('delete from memories where id = ?', [$id]);

		return redirect()->back();

	}
}
