<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Forum - Responsive HTML5 Template">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="{{ asset('design/favicon/favicon.ico') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('design/css/style.css') }}">
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
    </style>
</head>
<body>
@include('layouts.header')
@yield('content')
</body>

</html>
