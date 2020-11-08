@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'projects'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Projects</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Active
                                    </th>
                                    <th>
                                        Jobs
                                    </th>
                                    <th class="text-center" width="50">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            {{$project->scope}}
                                        </td>
                                        <td>
                                            @if($project->active)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                <i class="fas fa-times-circle text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            30 jobs
                                        </td>
                                        <td class="text-center">
                                            <form action="{{url("projects")}}/{{$project->id}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" value="{{(int)!$project->active}}" name="active" />

                                                    @if($project->active)
                                                    <button class="btn btn-block btn-sm btn-danger">
                                                        Deactivate
                                                    @else
                                                    <button class="btn btn-block btn-sm btn-success">
                                                        Activate
                                                    @endif
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center pagination">
                            {{$projects->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection