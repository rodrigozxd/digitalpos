<!DOCTYPE html>
<html lang="es">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'MYPEdigital POS') }}</title> 

    @include('layouts.partials.css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @inject('request', 'Illuminate\Http\Request')
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
    @endif
    <div class="container-fluid">
        <div class="row eq-height-row">
            
            <div class="col-md-8 col-sm-8 hidden-xs left-col eq-height-col" >
                <div class="left-col-content login-header"> 
                    <div style="margin-top: 50%;">
                    <a href="">
                    @if(file_exists(public_path('uploads/logo.png')))
                        <img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150">
                    @else
                       {{ config('app.name', 'MYPEdigital') }}
                    @endif 
                    </a>
                    <br/>
                    @if(!empty(config('constants.app_title')))
                        <small>{{config('constants.app_title', 'Sistema Punto de Venta')}}</small>
                    @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 right-col eq-height-col"  >
                <div class="div_centrado">

                    <div class="row">
                
                        <div class="col-md-9 col-xs-8" style="text-align: right;padding-top: 10px;">
                            @if(!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
                                <!-- Register Url -->
                                @if(config('constants.allow_registration'))
                                    
                                    <!-- pricing url -->
                                    @if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                                        &nbsp; <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                                    @endif
                                @endif
                            @endif
                            @if($request->segment(1) != 'login')
                                &nbsp; &nbsp;<span class="text-white">{{ __('business.already_registered')}} </span><a href="{{ action('Auth\LoginController@login') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif">{{ __('business.sign_in') }}</a>
                            @endif
                        </div>
                        
                        @yield('content')
                        </div>

                </div>
                
            </div>

        </div>
    </div>

    
    @include('layouts.partials.javascripts')
    
    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>
    
    @yield('javascript')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2_register').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>


    <style>
        .div_centrado{
            position: absolute;
            top:25%;
            left: 50%;           
            margin-top: -100px;
            margin-left: -100px;
        }
    </style>



</body>

</html>