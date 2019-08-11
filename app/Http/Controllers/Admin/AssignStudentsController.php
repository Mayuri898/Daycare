<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;

class AssignStudentsController extends Controller {
	public function assignstudents($id) {

		$data["assignstudents"] = DB::select('select * from students where teachers_id = ?', [$id]);

		// dd($data);
		return view('admin/teachers/assignstudents')->with($data);
	}
	public function dailystudentreport($id) {
		$studentdata['dailystudentreport'] = collect(DB::select('select * from students where id = ?', [$id]))->first();

		$studentdata["memories"] = DB::select('select * from memories where student_id = ?', [$id]);

		$studentdata["categories"] = DB::select('select * from report_categories');

		return view('admin/teachers/dailystudentreport')->with($studentdata);

	}
}
