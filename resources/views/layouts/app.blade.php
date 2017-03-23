<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <div>
        @include('partials.menu')

        @if( Session::get('flash_message') )
            <div class="container-fluid">
                <div class="row">
                    <div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data
                                -dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ Session::get('flash_message') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

        @include('partials.developer')

        @if( Session::get('flash_message') )
            <script>
                setTimeout(function(){
                    $("#success-alert").slideUp(5000);
                },2000);
            </script>
        @endif
    </div>


</body>

</html>
<script>
    $('.datepicker').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose : true
    });
</script>
