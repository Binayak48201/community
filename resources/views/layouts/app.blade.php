<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Community</title>
    <link rel="shortcut icon" href="{{ asset('design/favicon/favicon.ico') }}">
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

        .custom-red {
            color: red !important;
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

        .tw-flex {
            display: flex;
        }

        .height {
            height: 20px;
        }

        .red {
            color: red;
        }

        .white {
            color: white !important;
        }

        .header-color {
            background-image: radial-gradient(circle at 0 2%, #25395a, #162031 124%);
            color: white !important;
            border-radius: 30px 30px 0px 1px;
        }

        .tt-item.tt-info-box:hover {
            background: #e7e8e9;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
          integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="{{ asset('custom/app.js') }}" defer></script>

    <script>
        window.App = {!! json_encode([
        'signedIn' => auth()->check(),
        'user' => auth()->user()
        ])   !!};
    </script>
</head>
<body>
<div id="app">

    @include('layouts.header')
    @yield('content')

    <flash message="{{ session('flash') }}"></flash>

</div>
<script src="{{ asset('design/js/bundle.js') }}"></script>
{{-- <script src="{{ asset('node_modules/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('node_modules/ckeditor4-vue/dist/ckeditor.js') }}"></script> --}}

</body>

</html>
