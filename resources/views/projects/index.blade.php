@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'projects'
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
                        <h4 class="card-title">Projects ({{$projects->total()}})</h4>
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

                            <hr/><br/>
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
