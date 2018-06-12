<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="{{ asset("js/app.js") }}">
    </script>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    @yield('script')
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2" style="font-size: 2em;"><a href="/"><i>Auctions</i></a></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4><span id="auth"></span></h4>
                </div>
                <div class="col-md-2">
                    <h6><span id="logout"></span></h6>
                </div>
            </div>
        </div>
        <hr>
        @yield('content')
    </div>
</body>
</html>