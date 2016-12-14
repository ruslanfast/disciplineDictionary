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
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default">
                        <a href="http://discipline-dictionary/admin/add-faculty">Додати новий факультет</a>
                    </button>
                    <button type="button" class="btn btn-default">
                        <a href="http://discipline-dictionary/admin/add-department">Додати нову кафедру</a>
                    </button>
                    <button type="button" class="btn btn-default">
                        <a href="http://discipline-dictionary/admin/add-discipline">Додати нову дисципліну</a>
                    </button>
                </div>
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
@endsection

@section('content')
    <div class="container-fluid jumbotron">
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
                                    <a href="{{ url('/admin/search-by-faculty/' . $faculty->id)  }}">
                                        {{ $faculty->name }}
                                    </a>
                                </li>
                                <ul>
                                    @foreach( $departments as $department )
                                        @if( $faculty->id == $department->faculty_id )
                                            <li>
                                                <a href="{{ url('/admin/search-by-department/' . $department->id )  }}">
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
            <div class="col-lg-9 col-md-9 col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#A" data-toggle="tab">Дисципліни</a></li>
                    <li class=""><a href="#B" data-toggle="tab">Кафедри</a></li>
                    <li class=""><a href="#C" data-toggle="tab">Факультети</a></li>
                </ul>
                <div class="tabbable">
                    <div class="tab-content">
                        <div class="tab-pane active" id="A">
                            <table class="table table-scriped task-table">
                                <thead>
                                <tr>
                                    <th class="text-center">Назва дисципліни</th>
                                    <th class="text-center">Факультет</th>
                                    <th class="text-center">Кількість академічних годин</th>
                                    <th class="text-center">Редагування</th>
                                    <th class="text-center">Видалення</th>
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
                                        <td class="table-text">
                                            <div class="text-center">{{ $discipline->academic_time  }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/edit-discipline/$discipline->id") }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 col-xs-3"></div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4">
                                                        <button class="btn btn-sm btn-primary text-center">Редагувати
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4"></div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/delete-discipline/$discipline->id") }}"
                                                  method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 col-xs-3"></div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4">
                                                        <button class="btn btn-sm btn-danger text-center">Видалити
                                                        </button>
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
                        <div class="tab-pane" id="B">
                            <table class="table table-scriped task-table">
                                <thead>
                                <tr>
                                    <th class="text-center">Факультет</th>
                                    <th class="text-center">Кафедра</th>
                                    <th class="text-center">Редагування</th>
                                    <th class="text-center">Видалення</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $departments as $department )
                                    <tr>
                                        <td class="table-text">
                                            <div class="text-center">{{ $department->faculty_name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div class="text-center">{{ $department->name }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/edit-department/$department->id") }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 col-xs-3"></div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4">
                                                        <button class="btn btn-sm btn-primary text-center">Редагувати
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4"></div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/delete-department/$department->id") }}"
                                                  method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 col-xs-3"></div>
                                                    <div class="col-md-4 col-lg-4 col-xs-4">
                                                        <button class="btn btn-sm btn-danger text-center">Видалити
                                                        </button>
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
                        <div class="tab-pane" id="C">
                            <table class="table table-scriped task-table">
                                <thead>
                                <tr>
                                    <th class="text-center">Назва факультету</th>
                                    <th class="text-center">Редагування</th>
                                    <th class="text-center">Видалення</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $faculties as $faculty )
                                    <tr>
                                        <td class="table-text">
                                            <div class="text-center">{{ $faculty->name  }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/edit-faculty/$faculty->id") }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xs-12 text-center">
                                                        <button class="btn btn-sm btn-primary text-center">Редагувати
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url("/admin/delete-faculty/$faculty->id") }}"
                                                  method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xs-12 text-center">
                                                        <button class="btn btn-sm btn-danger text-center">Видалити
                                                        </button>
                                                    </div>
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
            </div>
        </div>
    </div>
@endsection
