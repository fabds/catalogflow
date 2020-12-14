@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="card-title">{{$user->firstname}} {{$user->lastname}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{url("users")}}"><i class="fa fa-list"></i> {{__("Users")}}</a>
                                <a class="btn btn-primary btn-sm" href="{{url("users")}}/{{$user->id}}"><i class="fa fa-eye"></i> {{__("View User")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{url("users")}}/{{$user->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__("Firstname")}}</label>
                                    <p>
                                        <h5>
                                            {{$user->firstname}}
                                        </h5>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__("Lastname")}}</label>
                                    <p>
                                        <h5>
                                            {{$user->lastname}}
                                        </h5>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__("Email")}}</label>
                                    <p>
                                        <h5>
                                            {{$user->email}}
                                        </h5>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__("Status")}}</label>
                                    <p>
                                    <h5>
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input name="status" @if($user->status) checked @endif type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </h5>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__("Role")}}</label>
                                    <p>
                                        <h5>
                                            @can('user-role')
                                                {!! Form::select('roles', $roles, $userRole, array('class' => 'form-control')) !!}
                                            @endcan
                                            @cannot('user-role')
                                                @foreach($userRole as $role)
                                                    {{$role}}
                                                @endforeach
                                            @endcannot
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
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-md btn-danger" href="{{url("users")}}/{{$user->id}}">{{__('Cancel')}}</a>
                                    <button type="submit" class="btn-primary btn btn-md">{{__("Update")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
