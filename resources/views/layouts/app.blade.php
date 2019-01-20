<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    {{--
    <link href="{{ asset('css/jquery.dropdown.min.css') }}" rel="stylesheet"> --}}
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.dropdown.min.js') }}"></script> --}}

    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                @if (Auth::check())
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users.profile') }}">My Profile</a>
                        </li>
                        @if (auth()->user()->isAdmin)
                        <li class="list-group-item">
                            <a href="{{ route('settings.index') }}">Site Settings</a>
                        </li>
                        @endif

                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><strong>Categories</strong></a>


                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('categories.index') }}">View Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('categories.create') }}">Create New Category</a>
                        </li>

                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><strong>Posts</strong></a>


                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('posts.index') }}">View Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('posts.create') }}">Create New Post</a>
                        </li>
                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('posts.trashed') }}">Trashed Posts</a>
                        </li>

                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><strong>Tags</strong></a>

                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('tags.index') }}">View Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('tags.create') }}">Create New Tag</a>
                        </li>
                        @if (auth()->user()->isAdmin)
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><strong>Users</strong></a>

                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('users.index') }}">View Users</a>
                        </li>
                        <li class="list-group-item">
                            <a class="ml-3" href="{{ route('users.create') }}">Create New User</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
@jquery
@toastr_js
@toastr_render

</html>
