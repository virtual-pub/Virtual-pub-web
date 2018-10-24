<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
            @yield('title', config('adminlte.title', 'AdminLTE 2'))
            @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Icon -->
            <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


<link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
<link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">

@if(config('adminlte.plugins.select2'))
<!-- Select2 -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
@endif

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

@if(config('adminlte.plugins.datatables'))
<!-- DataTables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endif

@yield('adminlte_css')

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">
        
        @yield('body')
        
        <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/vendor//bootstrap-colorpicker/dist/js//bootstrap-colorpicker.min.js') }}"></script>
        
        @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        @endif
        
        @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        @endif
        
        @if(config('adminlte.plugins.chartjs'))
        <!-- ChartJS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
        @endif
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
        <script src="{{asset('js/star-rating.js')}}"></script>
        @yield('adminlte_js')
        
    </body>
    </html>
    