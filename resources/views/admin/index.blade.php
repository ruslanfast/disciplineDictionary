@extends('layouts.app')

@section('header')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Довідник дисциплін ВНЗ') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Увійти</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Вийти
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12 col-sm-12 col-sm-12">
                <ul class="nav navbar-nav navbar-link">
                     {{--<li><a href="{{ url('/register') }}">Додати нового користувача</a></li>--}}
                     <li><a href="{{ url('/admin/add-faculty') }}">Додати новий факультет</a></li>
                     <li><a href="{{ url('/admin/add-department') }}">Додати нову кафедру</a></li>
                     <li><a href="{{ url('/admin/add-discipline') }}">Додати нову дисципліну</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                <h3>Поиск</h3>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <table class="table table-scriped task-table">
                    <thead>
                    <tr>
                        <th class="text-center">Назва дисципліни</th>
                        <th class="text-center">Факультет</th>
                        <th class="text-center">Детальна інформація</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $disciplines as $discipline )
                        <tr>
                            <td class="table-text">
                                <div class="text-center">{{ $discipline->name  }}</div>
                            </td>
                            <td class="table-text">
                                <div class="text-center">{{ $discipline->depart_name  }}</div>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="_token" value="IUidFe5d1LbIgO0wkqMlKS9cCiPZhZA9QkGwobJI">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-xs-3"></div>
                                        <div class="col-md-4 col-lg-4 col-xs-4">
                                            <button class="btn btn-sm btn-success text-center">Детальніше</button>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xs-4"></div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
