@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'roles'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search_results')
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="card-title">{{__("Roles")}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{url("roles")}}"><i class="fa fa-list"></i> {{__("Roles")}}</a>
                                <a class="btn btn-primary btn-sm" href="{{url("roles")}}/{{$role->id}}"><i class="fa fa-eye"></i> {{__("View Role")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Name")}}</label>
                                <p>
                                <h5>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control-label">{{__("Permissions")}}</label>
                                <p>
                                <h5>
                                    <div class="row">
                                    @foreach($permission as $value)
                                        <div class="col-md-3">
                                        <label>
                                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}
                                        </label>
                                        <br/>
                                        </div>
                                    @endforeach
                                    </div>
                                </h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-md btn-danger" href="{{url("roles")}}/{{$role->id}}">{{__('Cancel')}}</a>
                                <button type="submit" class="btn-primary btn btn-md">{{__("Update")}}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
