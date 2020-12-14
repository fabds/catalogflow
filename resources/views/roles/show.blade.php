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
                                <h3 class="card-title"> {{__("Roles")}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{url("roles")}}"><i class="fa fa-list"></i> {{__("Roles")}}</a>
                                <a class="btn btn-primary btn-sm" href="{{url("roles")}}/{{$role->id}}/edit"><i class="fa fa-edit"></i> {{__("Edit")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control-label">{{__("Name")}}</label>
                                <p>
                                <h5 class="text-dark">{{ $role->name }}</h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__("Permissions")}}</label>
                                <p>
                                <h5 class="text-dark">
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <span class="badge badge-primary">{{ $v->name }}</span>
                                        @endforeach
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
