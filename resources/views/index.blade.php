@extends('layouts.app')

@section('header')
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="row text-center">
                <h1>{{ config('app.name', 'Довідник дисциплін ВНЗ') }}</h1>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">
                <div class="btn-group" role="group">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Увійти</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Вийти
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
        </div>
    </div>
    {{--<nav class="navbar navbar-default navbar-static-top">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}
                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name') }}--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--&nbsp;--}}
                {{--</ul>--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">Увійти</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Зареєструватися</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url('/logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--Вийти--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
@endsection

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>Поиск</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul>
                                @foreach( $faculties as $faculty )
                                    <li>
                                        <a href="{{ url('/search-by-faculty/' . $faculty->id)  }}">
                                            {{ $faculty->name }}
                                        </a>
                                    </li>
                                    <ul>
                                        @foreach( $departments as $department )
                                            @if( $faculty->id == $department->faculty_id )
                                                <li>
                                                    <a href="{{ url('/search-by-department/' . $department->id )  }}">
                                                        {{ $department->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <table class="table table-scriped task-table">
                    <thead>
                    <tr>
                        <th class="text-center">Факультет</th>
                        <th class="text-center">Кафедра</th>
                        <th class="text-center">Назва дисципліни</th>
                        <th class="text-center">Кількість академічних годин</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ( ! empty( $disciplines ) )
                        @foreach( $disciplines as $discipline )
                            <tr>
                                <td class="table-text">
                                    <div class="text-center">{{ $discipline->faculty_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div class="text-center">{{ $discipline->depart_name  }}</div>
                                </td>
                                <td class="table-text">
                                    <div class="text-center">{{ $discipline->name  }}</div>
                                </td>
                                <td class="table-text">
                                    <div class="text-center">{{ $discipline->academic_time  }}</div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection