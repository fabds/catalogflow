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
                                <h3 class="card-title">Job {{$job->key}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{url("jobs")}}"><i class="fa fa-list"></i> {{__('All Jobs')}}</a>
                                <a class="btn btn-primary btn-sm" href="{{url("jobs")}}/{{$job->id}}"><i class="fa fa-eye"></i> {{__('View Job')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{url("jobs")}}/{{$job->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Filename')}}</label>
                                    <p>
                                    <?php
                                    $filenames = explode(";", $job->filename);
                                    ?>
                                    @foreach($filenames as $file)
                                        <h5 class="text-dark"><i class="fa fa-file-csv mr-1"></i> {{$file}}</h5>
                                        @endforeach
                                        </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Project')}}</label>
                                    <p>
                                    <h5>
                                        {{$job->project}}
                                    </h5>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Type')}}</label>
                                    <p><h5>{{$job->type}}</h5></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Environment</label>
                                    @if(isset($catalogflow_config['environments'][$job->environment]))
                                        <p><h5 class="text-{{$catalogflow_config['environments'][$job->environment]['type']}}">{{$catalogflow_config['environments'][$job->environment]['label']}}</h5></p>
                                    @else
                                        <p><span class="badge badge-pill badge-danger"><i class="fa fa-warning"></i> --ENVIRONMENT NOT VALID--</span></p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Key')}}</label>
                                    <p><h5><code>{{$job->key}}</code></h5></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Status</label>
                                    <p>
                                        <select class="form-control" name="status">
                                            @can('job-edit')
                                                @foreach($catalogflow_config['statuses'] as $status => $statudetails)
                                                    <option value="{{$status}}"
                                                            @if($status==$job->status) selected @endif>{{$statudetails['label']}}
                                                    </option>
                                                @endforeach
                                            @endcan
                                            @can('job-manage')
                                                @foreach($catalogflow_config['statuses'] as $status => $statudetails)
                                                    @if($status=='received'||$status=='processed'||$status==$job->status)
                                                        <option value="{{$status}}"
                                                                @if($status==$job->status) selected @endif>{{$statudetails['label']}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endcan
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label">{{__('Notes')}}</label>
                                    <p>
                                        @can('job-manage')
                                            <textarea class="form-control" name="notes">{{$job->notes}}</textarea>
                                        @endcan
                                        @cannot('job-manage')
                                            @if(!empty($job->notes))
                                                {{$job->notes}}
                                            @else
                                                -
                                            @endif
                                        @endcan
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label">{{__('Log')}}</label>
                                    <p>
                                        @can('job-edit')
                                            <textarea class="form-control" name="log">{{$job->log}}</textarea>
                                        @endcan
                                        @cannot('job-edit')
                                            @if(!empty($job->log))
                                                {{$job->log}}
                                            @else
                                                -
                                            @endif
                                        @endcan
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Created At')}}</label>
                                    <p>
                                    <h5>
                                        @if(!empty($job->created_at))
                                            {{$job->created_at}}
                                        @else
                                            -
                                        @endif
                                    </h5>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">{{__('Processed At')}}</label>
                                    <p>
                                    <h5>
                                        @if(!empty($job->processed_at))
                                            {{$job->processed_at}}
                                        @else
                                            -
                                        @endif
                                    </h5>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-md btn-danger" href="{{url("jobs")}}/{{$job->id}}">{{__('Cancel')}}</a>
                                    <button type="submit" class="btn-primary btn btn-md">{{__('Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
