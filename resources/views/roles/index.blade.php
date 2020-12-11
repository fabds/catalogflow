@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'roles'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search_results')
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="card-title">{{__("Roles")}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @can('role-create')
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> {{__('New Role')}}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">



                        <div class="table-responsive">
                            <table class="table ">
                                <thead class=" text-secondary">
                                    <tr>
                                        <th>{{__("Id")}}</th>
                                        <th>{{__("Name")}}</th>
                                        <th width="280px">{{__("Actions")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td><a href="{{ route('roles.show',$role->id) }}" class="font-weight-bold" >{{ $role->name }}</a></td>
                                            <td>
                                                @can('role-edit')
                                                    <a class="btn btn-sm btn-icon btn-info" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('role-delete')
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger delete-role" data-elementid="{{$role->id}}"><i class="fa fa-times"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $roles->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.delete-role', function(){
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
                        url: '{{url("roles/")}}/'+elementid,
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
