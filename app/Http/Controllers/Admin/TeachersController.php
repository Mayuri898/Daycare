<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teachers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$users = DB::select('select * from teachers');
		return view('admin/teachers/index', ['users' => $users]);
	}

	public function show($id) {

		$user = collect(DB::select('select * from teachers where id = ?', [$id]))->first();

		return view('admin/teachers/edit', ['user' => $user]);
	}

	public function update(Request $request, $id, Teachers $teachers) {
		if (isset($request->image) && $request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('teachers', $file);
		} else {
			if (!$teachers->image) {
				$file = '';
			} else {
				$file = $teachers->image;
			}

		}
		$name = $request->input('name');
		$teachers->image = $file;
		$email = $request->input('email');
		$password = $request->input('password');

		$isUpdated = DB::update('update teachers set name = ?,image=?,email=?,password=? where id = ?',
			[$name, $teachers->image, $email, $password, $id]);

		$users = DB::select('select * from teachers');
		return view('admin/teachers/index', ['users' => $users]);

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
	public function store(Request $request, Teachers $teachers) {
		if ($request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('public/teachers', $file);
		} else {
			$file = '';
		}
		$teachers->image = $file;
		$teachers->name = $request->name;
		$teachers->email = $request->email;
		$teachers->password = Hash::make($request->password);

		$teachers->save();
		return redirect('admin/teachers');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	/*public function show($id) {
				$users = DB::select('select * from teachers where id = ?',[$id]);
		      return view('stud_update',['users'=>$users]);
			}

			/**
			 * Show the form for editing the specified resource.
			 *
			 * @param  int  $id
			 * @return \Illuminate\Http\Response
	*/
	/*public function edit(Teachers $teachers) {
			$arr['teachers'] = $teachers;

			return view('admin.teachers.edit')->with($arr);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
	*/
	/*public function update(Request $request, Teachers $teachers) {
			if (isset($request->image) && $request->image->getClientOriginalName()) {
				$ext = $request->image->getClientOriginalExtension();
				$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
				$request->image->storeAs('public/teachers', $file);
			} else {
				if (!$teachers->image) {
					$file = '';
				} else {
					$file = $teachers->image;
				}

			}
			$teachers->image = $file;
			$teachers->name = $request->name;
			$teachers->email = $request->email;

			$teachers->save();
			return redirect()->route('admin.teachers.index');

		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
	*/
	public function destroy($id, Teachers $teachers) {
		DB::delete('delete from teachers where id = ?', [$id]);

		// return view('admin/teachers/index');
		return redirect()->route('admin.teachers.index');
		//$user->delete();
		//return redirect()->route('admin.teachers.index');
		//
	}
}
