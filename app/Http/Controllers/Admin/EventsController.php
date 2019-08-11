<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class EventsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['eventsdata'] = DB::select('select * from events');

		// dd($data);

		return view('admin/events/index')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}
	public function show($id) {

		$data['user'] = collect(DB::select('select * from events where id = ?', [$id]))->first();

		return view('admin/events/edit')->with($data);
	}
	public function update(Request $request, $id, Events $events) {

		if (isset($request->image) && $request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('events', $file);
		} else {
			if (!$events->image) {
				$file = '';
			} else {
				$file = $events->image;
			}

		}
		$name = $request->input('name');
		$events->image = $file;
		$organizeddate = $request->input('organizeddate');
		$description = $request->input('description');

		$isUpdated = DB::update('update events set name = ?,image=?,organizeddate=?,description=? where id = ?',
			[$name, $events->image, $organizeddate, $description, $id]);

		return redirect('admin/events');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Events $events) {

		if ($request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('events', $file);

		} else {
			$file = '';
		}
		$events->image = $file;
		$events->name = $request->name;
		$events->organizeddate = $request->organizeddate;
		$events->description = $request->description;

		$events->save();

		return redirect('admin/events');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		DB::delete('delete from events where id = ?', [$id]);

		// return view('admin/teachers/index');
		return redirect()->route('admin.events.index');
	}
}
