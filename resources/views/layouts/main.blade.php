
<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aqualens Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
    <style>
        .logo img{
            height: 25px !important;
            padding: 3px !important;
            width: auto !important;
        }

        .select2-container,.normal-select{
            width: -webkit-fill-available !important;
        }

    </style>
    @yield('custom_css')

</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">


            

            <div class="d-flex align-items-center">
                <div class="logo">
                    LOGO HERE
                </div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Notificaiton -->

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user colalign-self-end">
                        USER ICON
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> User
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.sidebar')

        @yield('content')

    </div>
    @section('scripts')
        <script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>

        <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>

        <script src="{{asset('assets/js/es5/script.min.js')}}"></script>
        <script src="{{asset('assets/js/es5/sidebar.large.script.min.js')}}"></script>

    @show
</body>

</html>


