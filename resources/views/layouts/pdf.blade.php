<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>output pdf</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: ipag;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipag.ttf') }}');
        }

        @font-face {
            font-family: ipag;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipag.ttf') }}');
        }

        body {
            font-family: ipag;
        }
    </style>
    @yield('style')

</head>

<body>
    @yield('content')
</body>

</html>
