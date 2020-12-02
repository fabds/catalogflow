@extends('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
])

@section('content')
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header py-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 pt-5">
                            <div class="border p-10">
                                <br/>
                                <h1 class="@if(Auth::guest()) text-white @endif"><i class="fa fa-book"></i></h1>

                                <h3 class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                                    {{ __('Documentation') }}
                                </h3>
                                <br/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 pt-5">
                            <div class="border p-10">
                                <br/>
                                <h1 class="@if(Auth::guest()) text-white @endif"><i class="fa fa-tachometer-alt"></i> </h1>

                                <h3 class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                                    {{ __('Dashboard') }}
                                </h3>
                                <br/>
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
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
