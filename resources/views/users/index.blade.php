@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @if(isset($_GET['s']) && !empty($_GET['s']))
                    @if(strlen($_GET['s'])>=3)
                        <h4>Results for <strong>'{{$_GET['s']}}'</strong></h4>
                    @else
                        <h4>Can't find results for <strong>'{{$_GET['s']}}'</strong>. Please insert at least 3 chars</h4>
                    @endif
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Department
                                </th>
                                <th width="50" class="text-center">
                                    Actions
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
                                            {{$user->department}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{url("users")}}/{{$user->id}}/edit"><i class="fa fa-edit mr-1"></i> Edit User</a>
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
