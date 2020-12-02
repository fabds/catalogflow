<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * @param Jobs $model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Jobs $model)
    {
        $mod = $model;
        if(isset($_GET['s']) && !empty($_GET['s']) && strlen($_GET['s'])>=3) {
            $mod = $model->search($_GET['s']);
        }
        return view('jobs.index', ['jobs' => $mod->paginate(10), 'catalogflow_config' => config('catalogflow')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobs.view', ['job' => Jobs::find($id), 'catalogflow_config' => config('catalogflow')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('jobs.edit', ['job' => Jobs::find($id), 'catalogflow_config' => config('catalogflow')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Jobs::find($id);
        $job->status = $request["status"];
        $job->log = $request["log"];
        $job->notes = $request["notes"];
        $job->save();
        return redirect('jobs/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Jobs::find($id);
        $job->delete();
    }
}
