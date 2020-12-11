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
                                <a class="btn btn-primary btn-sm" href="{{url("jobs")}}/{{$job->id}}/edit"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__('Filename')}}</label>
                                <p>
                                    <?php
                                        $filenames = explode(",", $job->filename);
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
                                <label class="form-control-label">{{__('Environment')}}</label>
                                @if(isset($catalogflow_config['environments'][$job->environment]))
                                    <p><h5 class="text-{{$catalogflow_config['environments'][$job->environment]['type']}}">{{$catalogflow_config['environments'][$job->environment]['label']}}</h5></p>
                                @else
                                    <p><h5 class="text-danger"><i class="fa fa-warning"></i> --ENVIRONMENT NOT VALID--</h5></p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__('Key')}}</label>
                                <p><h5><code>{{$job->key}}</code></h5></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label">{{__('Status')}}</label>
                                @if(isset($catalogflow_config['statuses'][$job->status]))
                                    <p><h5 class="text-{{$catalogflow_config['statuses'][$job->status]['type']}}">{{$catalogflow_config['statuses'][$job->status]['label']}}</h5></p>
                                @else
                                    <p><h5 class="text-danger"><i class="fa fa-warning"></i> --STATUS NOT VALID--</h5></p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control-label">{{__('Notes')}}</label>
                                <p>
                                <h5>
                                    @if(!empty($job->notes))
                                        {{$job->notes}}
                                    @else
                                        -
                                    @endif
                                </h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control-label">{{__('Log')}}</label>
                                <p>
                                    <h5>
                                    @if(!empty($job->log))
                                        {{$job->log}}
                                    @else
                                        -
                                    @endif
                                    </h5>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__('Created At')}}</label>
                                <p>
                                    <h5>
                                    @if(!empty($job->created_at))
                                        {{$job->created_at->format($catalogflow_config['formats']['date']['human_datetime'])}}
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
                                        {{$job->processed_at->format($catalogflow_config['formats']['date']['human_datetime'])}}
                                    @else
                                        -
                                    @endif
                                    </h5>
                                </p>
                            </div>
                        </div>
                        @can('job-download-file')
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">{{__('Files')}}</label>
                                <p>
                                    <a class="btn btn-primary" href="">
                                        <i class="fa fa-cloud-download-alt mr-2"></i>
                                        {{__('Download Job Files')}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
