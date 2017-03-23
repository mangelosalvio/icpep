<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                        <a href="{{ url('/shuffle-students') }}">Shuffle Students</a>
                        <a href="{{ url('/shuffle-professionals') }}">Shuffle Professionals</a>
                </div>
            @endif

            <div class="content">
                <div class="text-center" style="font-weight: bold; font-size: 30px;">
                    PROFESSIONALS
                </div>
                <div class="title m-b-md" class="students-body">
                    @foreach($students as $i => $student)
                        <div style="display: none; height:200px;" id="s{{ $i }}" class="s">
                            {{ strtoupper($student->first_name) }} {{ strtoupper($student->last_name) }}
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <input type="button" id="btn" value="START" class="btn" style="font-size: 40px;">
                </div>

                <div class="text-center" style="font-size: 13px;">
                    @include('partials.developer')
                </div>
            </div>



        </div>
    </body>
    <script>
        $(function(){

            var interval = null;

            $('#btn').click(function(){
                if ( $(this).val() == "START" ) {
                    interval = setInterval(function(){
                        $('.s').hide();
                        var random = Math.floor(Math.random() * {{ count($students) -1  }}) + 1;
                        //console.log(random);
                        $('#s' + random).show();

                    },10);

                    $(this).val("STOP")
                } else {
                    clearInterval(interval);
                    $(this).val("START")
                }
            });




            alert(random);
        });
    </script>
</html>
