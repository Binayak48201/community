<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Community</title>
    <link rel="shortcut icon" href="{{ asset('design/favicon/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('design/css/style.css') }}">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
=======
>>>>>>> 3c8009a2ca553d612fde8770e4899a9fa2523fdd
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

        .btn.btn-colorred {
            background-color: #ff000d;
            color: white;
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

<<<<<<< HEAD
=======
        .tw-flex {
            display: flex;
        }
>>>>>>> 3c8009a2ca553d612fde8770e4899a9fa2523fdd
    </style>
</head>

<body>
<<<<<<< HEAD
    <div id="app">
        {{-- <Home></Home> --}}
        @include('layouts.header') <br>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
        {{-- <div id="app"> --}}
        {{-- <Home></Home> --}}

    </div>
    <script src="{{ asset('custom/app.js') }}"></script>
=======
<div id="app">

    @include('layouts.header')
    @yield('content')

    <Flash message="{{ session('flash') }}"></Flash>

</div>
<script src="{{ asset('custom/app.js') }}"></script>
>>>>>>> 3c8009a2ca553d612fde8770e4899a9fa2523fdd
</body>

</html>
