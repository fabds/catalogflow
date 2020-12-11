@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'projects'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search_results')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__("Projects")}} ({{$projects->total()}})</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                    <th>
                                        {{__("Name")}}
                                    </th>
                                    <th>
                                        {{__("Status")}}
                                    </th>
                                    <th>
                                        {{__("Jobs")}}
                                    </th>
                                    @can('project-edit')
                                    <th class="text-center" width="50">
                                        {{__("Actions")}}
                                    </th>
                                    @endcan
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
                                            <a href="{{url("jobs?s=" . $project->scope)}}"><strong>{{$project->jobs()->count()}}</strong> jobs</a>
                                        </td>
                                        @can('project-edit')
                                        <td class="text-center">
                                            <form action="{{url("projects")}}/{{$project->id}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" value="{{(int)!$project->active}}" name="active" />

                                                    @if($project->active)
                                                    <button class="btn btn-block btn-sm btn-danger">
                                                        {{__("Deactivate")}}
                                                    @else
                                                    <button class="btn btn-block btn-sm btn-success">
                                                        {{__("Activate")}}
                                                    @endif
                                                </button>
                                            </form>
                                        </td>
                                        @endcan
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
