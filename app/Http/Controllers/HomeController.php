<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Jobs;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = [];
        $stats['all_projects'] = Config::all();
        $stats['active_projects'] = Config::where("active","1");
        $stats['inactive_projects'] = Config::where("active","0");
        $stats['all_jobs'] = Jobs::all();
        $stats['to_process_jobs'] = Jobs::whereIn("status",["received"]);
        $stats['processed_jobs'] = Jobs::whereIn("status",["processed","uploaded"]);
        $stats['error_jobs'] = Jobs::whereIn("status",["not_valid_pattern","error","bucket_not_found","not_valid_pattern_lv2"]);
        $stats['stucked_jobs'] = Jobs::whereIn("status",["fetched","validating","validated","processing","uploading"]);
        return view('pages.dashboard', compact(["stats"]));
    }
}
