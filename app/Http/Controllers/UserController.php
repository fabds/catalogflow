<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $mod = $model;
        if(isset($_GET['s']) && !empty($_GET['s']) && strlen($_GET['s'])>=3) {
            $mod = $model->search($_GET['s']);
        }
        return view('users.index', ['users' => $mod->paginate(15)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.view', ['user' => $user, 'catalogflow_config' => config('catalogflow'), 'userRole' => $userRole]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::whereNotIn('name', ['Admin'])->pluck('name', 'name');
        if($user->hasRole('Admin')) {
            $roles = Role::pluck('name', 'name')->all();
        }
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit', ['user' => $user, 'catalogflow_config' => config('catalogflow'), 'roles' => $roles, 'userRole' => $userRole]);
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
        $user = User::find($id);
        $user->status = (bool) isset($request["status"]);
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect('users/'.$id);
    }
}
