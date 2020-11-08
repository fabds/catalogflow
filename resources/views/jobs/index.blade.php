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
                        <h4 class="card-title"> Jobs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                    <th>
                                        Filename
                                    </th>
                                    <th>
                                        Project
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Key
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Processed At
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url("jobs")}}/{{$job->id}}">{{$job->filename}}</a>
                                        </td>
                                        <td>
                                            {{$job->project}}
                                        </td>
                                        <td>
                                            {{$job->type}}
                                        </td>
                                        <td>
                                            <code>{{$job->key}}</code>
                                        </td>
                                        <td>
                                            @if(isset($catalogflow_config['statuses'][$job->status]))
                                                <span style="font-size: 12px;" class="badge badge-{{$catalogflow_config['statuses'][$job->status]['type']}}">{{$catalogflow_config['statuses'][$job->status]['label']}}</span>
                                            @else
                                                <span class="badge badge-danger"><i class="fa fa-warning"></i> --STATUS NOT VALID--</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{!empty($job->created_at)?$job->created_at:'-'}}
                                        </td>
                                        <td>
                                            {{!empty($job->processed_at)?$job->processed_at:'-'}}
                                        </td>
                                        <td>
                                            <a href="{{url("jobs")}}/{{$job->id}}/edit" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>

                                            <a href="{{url("jobs")}}/{{$job->id}}/edit" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center pagination">
                            {{$jobs->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection