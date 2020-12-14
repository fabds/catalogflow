@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search_results')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{__("Users")}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                <th>
                                    {{__("Name")}}
                                </th>
                                <th>
                                    {{__("Email")}}
                                </th>
                                <th>
                                    {{__("Role")}}
                                </th>
                                <th>
                                    {{__("Status")}}
                                </th>
                                <th width="50" class="text-center">
                                    {{__("Actions")}}
                                </th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url("users")}}/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a>
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            @foreach($user->getRoleNames() as $role)
                                                {{$role}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($user->status)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                <i class="fas fa-times-circle text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-primary btn-sm" href="{{url("users")}}/{{$user->id}}/edit"><i class="fa fa-edit mr-1"></i> {{__("Edit")}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center pagination">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
