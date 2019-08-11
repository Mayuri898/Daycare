<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Students;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['students'] = DB::select('select * from students');
		$data['teachers'] = DB::select('select * from teachers');
		// dd($data);

		return view('admin/students/index')->with($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Students $students) {

		if ($request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('public/students', $file);
		} else {
			$file = '';
		}
		$students->image = $file;
		$students->name = $request->name;
		$students->email = $request->email;
		$students->password = Hash::make($request->password);
		$students->age = $request->age;
		$students->teachers_id = $request->teachers_id;
		$students->mobileno = $request->mobileno;

		$students->save();

		return redirect('admin/students');
	}
	public function show($id) {

		$data['user'] = collect(DB::select('select * from students where id = ?', [$id]))->first();

		$data['teachers'] = DB::select('select * from teachers');

		return view('admin/students/edit')->with($data);
	}
	public function update(Request $request, $id, Students $students) {

		if (isset($request->image) && $request->image->getClientOriginalName()) {
			$ext = $request->image->getClientOriginalExtension();
			$file = date('YmdHis') . rand(1, 999999) . '.' . $ext;
			$request->image->storeAs('students', $file);
		} else {
			if (!$students->image) {
				$file = '';
			} else {
				$file = $students->image;
			}

		}
		$name = $request->input('name');
		$students->image = $file;
		$email = $request->input('email');
		$password = $request->input('password');
		$age = $request->age;
		$students->teachers_id = $request->teachers_id;
		$students->mobileno = $request->mobileno;

		$isUpdated = DB::update('update students set name = ?,image=?,email=?,password=?,age=?,teachers_id=?,mobileno=? where id = ?',
			[$name, $students->image, $email, $password, $age, $students->teachers_id, $students->mobileno, $id]);
		// $data['students'] = DB::select('select * from students');
		// $data['teachers'] = DB::select('select * from teachers');
		// dd($data);
		// return view('admin/students/index')->with($data);
		return redirect('admin/students');

	}

	public function destroy($id) {
		DB::delete('delete from students where id = ?', [$id]);

		// return view('admin/teachers/index');
		return redirect()->route('admin.students.index');
		//$user->delete();
		//return redirect()->route('admin.teachers.index');
		//
	}
}
