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
                                <a class="btn btn-primary btn-sm" href="{{url("jobs")}}"><i class="fa fa-list"></i> All Jobs</a>
                                <a class="btn btn-primary btn-sm" href="{{url("jobs")}}/{{$job->id}}"><i class="fa fa-eye"></i> View Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{url("jobs")}}/{{$job->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Filename</label>
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
                                    <label class="form-control-label">Project</label>
                                    <p>
                                    <h5>
                                        {{$job->project}}
                                    </h5>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Type</label>
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
                                    <label class="form-control-label">Key</label>
                                    <p><h5><code>{{$job->key}}</code></h5></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Status</label>
                                    <p>
                                        <select class="form-control" name="status">
                                            @foreach($catalogflow_config['statuses'] as $status => $statudetails)
                                                <option value="{{$status}}"
                                                        @if($status==$job->status) selected @endif>{{$statudetails['label']}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label">Notes</label>
                                    <p>
                                        <textarea class="form-control" name="notes">{{$job->notes}}</textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label">Log</label>
                                    <p>
                                        <textarea class="form-control" name="log">{{$job->log}}</textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Created At</label>
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
                                    <label class="form-control-label">Processed At</label>
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
                                    <button type="submit" class="btn-primary btn btn-md">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection