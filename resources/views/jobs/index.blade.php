@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'jobs'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search_results')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jobs ({{$jobs->total()}})</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-secondary">
                                    <th style="max-width: 300px; word-wrap:break-word;">
                                        {{__("Filename")}}
                                    </th>
                                    <th>
                                        {{__("Project")}}
                                    </th>
                                    <th>
                                        {{__("Type")}}
                                    </th>
                                    <th>
                                        {{__("Key")}}
                                    </th>
                                    <th>
                                        {{__("Status")}}
                                    </th>
                                    <th>
                                        {{__("Created At")}}
                                    </th>
                                    <th>
                                        {{__("Processed At")}}
                                    </th>
                                    <th class="text-center">
                                        {{__("Actions")}}
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <a class="font-weight-bold" href="{{url("jobs")}}/{{$job->id}}">{{$job->filename}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url("projects?s=" . $job->project)}}">{{$job->project}}</a>
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
                                            {{!empty($job->created_at)?$job->created_at->format($catalogflow_config['formats']['date']['human_datetime']):'-'}}
                                        </td>
                                        <td>
                                            {{!empty($job->processed_at)?$job->processed_at->format($catalogflow_config['formats']['date']['human_datetime']):'-'}}
                                        </td>
                                        <td class="text-center">
                                            @canany(['job-edit','job-manage'])
                                            <a href="{{url("jobs")}}/{{$job->id}}/edit" class="btn btn-sm btn-icon btn-info"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('job-delete')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger delete-job" data-elementid="{{$job->id}}"><i class="fa fa-times"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center pagination">
                            {{$jobs->appends(request()->query())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.delete-job', function(){
            var el = $(this);
            var elementid = el.data('elementid');
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: '{{url("jobs/")}}/'+elementid,
                        data: {"_token": "{{ csrf_token() }}"},
                        success: function (data) {
                            catalogflow.showNotification('<h5>Avviso</h5><h6>Job '+ elementid +' eliminato con successo</h6>', 'nc-icon nc-bell-55', 'success','top','right');
                            el.parent().parent().remove();
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'The operation has been aborted',
                        'error'
                    )
                }
            });
        });
    </script>
@endpush
