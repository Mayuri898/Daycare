<?php

namespace App\Http\Controllers\admin;

use App\DailyReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyReportController extends Controller {

	public function store(Request $request, DailyReport $dailyReport) {

		$dailyReport->report_date = $request->report_date;
		$dailyReport->from_time = $request->from_time;
		$dailyReport->to_time = $request->to_time;
		$dailyReport->description = $request->description;
		$dailyReport->mood = $request->mood;
		$dailyReport->category_id = $request->category;

		$dailyReport->save();

		return redirect()->back();
	}
}
