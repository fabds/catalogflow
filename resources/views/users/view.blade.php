@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'jobs'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="card-title">{{$user->name}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{url("users")}}"><i class="fa fa-list"></i> {{__("Users")}}</a>
                                <a class="btn btn-primary btn-sm" href="{{url("users")}}/{{$user->id}}/edit"><i class="fa fa-edit"></i> {{__("Edit")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Firstname")}}</label>
                                <p>
                                    <h5 class="text-dark">{{$user->firstname}}</h5>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Lastname")}}</label>
                                <p>
                                <h5 class="text-dark">{{$user->lastname}}</h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Email")}}</label>
                                <p>
                                <h5>
                                    <h5 class="text-dark">{{$user->email}}</h5>
                                </h5>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Department")}}</label>
                                <p>
                                <h5 class="text-dark">Tech</h5>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">Role</label>
                                <p>
                                <h5>
                                    Admin
                                </h5>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label">Status</label>
                                <p>
                                <h5>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input @if($user->status) checked @endif disabled type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </h5>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Created At")}}</label>
                                <p>
                                <h5>
                                    @if(!empty($user->created_at))
                                        {{$user->created_at->format($catalogflow_config['formats']['date']['human_datetime'])}}
                                    @else
                                        -
                                    @endif
                                </h5>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Updated At")}}</label>
                                <p>
                                    <h5>
                                    @if(!empty($user->updated_at))
                                        {{$user->updated_at->format($catalogflow_config['formats']['date']['human_datetime'])}}
                                    @else
                                        -
                                    @endif
                                    </h5>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
