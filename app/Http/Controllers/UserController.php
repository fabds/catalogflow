<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        return view('users.view', ['user' => User::find($id)]);
    }
}
