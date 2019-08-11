<?php

namespace App\Http\Controllers;
use Student;

class AttendanceController extends Controller {
	public function index() {
		$students = Student::all();
		return view('admin.attendance.take-attendance');
	}
}
