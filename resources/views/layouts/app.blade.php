<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Community</title>
    <link rel="shortcut icon" href="{{ asset('design/favicon/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('design/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        ul {
            list-style-type: none;
        }

        li.page-item {
            padding: 0px 10px;
        }

        .custom-flex {
            width: 100%;
            display: flex;
            justify-content: end;
        }

        .custom-red {
            color: red;
        }

        .custom-button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>
</head>
<body>
<div id="app">
    {{--    <Home></Home>--}}

    @include('layouts.header')
    @yield('content')
</div>
<script src="{{ asset('custom/app.js') }}"></script>
</body>

</html>
