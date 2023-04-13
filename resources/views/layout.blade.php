<!DOCTYPE html>
<html>
<head>
    <title>Laravel - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
    <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #777777;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .body-image{
            /* background-image: url("{{asset('image/glass-background-with-frosted-pattern.jpg')}}"); */
            background-color: #ffffff;
            background: cover;
            opacity: 0.9;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #141111;">
    <div class="container ">
        {{-- <a class="navbar-brand" href="#"><strong>PrabhuKumar J</strong></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" style="color:aqua; font-size : 20px" href="{{ route('login') }}"><strong>Login</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:aqua; font-size: 20px" href="{{ route('register') }}"><strong>Register</strong></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 20px" href="{{ route('logout') }}"><strong>Logout</strong></a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
