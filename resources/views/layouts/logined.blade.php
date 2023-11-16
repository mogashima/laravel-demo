@extends('layouts.app')

@section('base')
    <header class="container d-none d-lg-block">
        <h1>{{ config('app.name', 'Laravel') }}</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="nav-contents fs-5">
            <a class="navbar-brand d-lg-none fs-3" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto equal-spacing">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.notice.index') }}">お知らせ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.device.index') }}">端末</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.user.index') }}">ユーザ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <footer></footer>
@endsection
