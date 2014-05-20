<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('head')
</head>
<body>
<div class="container">

    <header class="row">
    </header>

    <div id="main" class="row">

        @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>