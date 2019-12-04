<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" charset="utf-8"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
   </head>
   <body>
    @yield('content')
    <script type="text/javascript">
        $(document).ready(function() {
          $("input[name='phone']").mask("+7 (999) 999 99 99");
            $(".btn-submit").click(function(e){
               var form = $(this).closest('form');
                e.preventDefault();
                var ordered = '0';
                var _token = $(form).find("input[name='_token']").val();
                var car_marka = $(form).find("input[name='car_marka']").val();
                var car_model = $(form).find("input[name='car_model']").val();
                var phone = $(form).find("input[name='phone']").val();
                var color = $(form).find("select[name='color']").val();
                if ($(form).find("input[name='ordered']").prop( "checked" )) {
                  ordered="1";
                }
                var comment = $(form).find("textarea[name='comment']").val();
                $.ajax({
                    url: $(form).attr('action'),
                    type:'POST',
                    data: {_token:_token, car_marka:car_marka, car_model:car_model, phone:phone, color:color,ordered:ordered,comment:comment},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                          $('.all-cars').html(data);
                          $(".print-error-msg").find("ul").html('');
                          $(".print-error-msg").css('display','none');
                            $(form)[0].reset();
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });


            });
            function printErrorMsg (msg) {
               $(".print-error-msg").find("ul").html('');
               $(".print-error-msg").css('display','block');
               $.each( msg, function( key, value ) {
                   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
               });
           }
        });
    </script>
    </body>
</html>
