<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hills</title>

    @yield('head')
</head>
<body>
    @include('partials.navigation')

    <ul>
    @foreach($errors->all('<li>:message</li>') as $error)
        {{ $error }}
    @endforeach
    </ul>

    @yield('main')

    @yield('bottom')
</body>
</html>
