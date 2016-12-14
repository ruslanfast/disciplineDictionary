@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Оновлення дисципліни</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url("/admin/update-discipline/" . $discipline[0]->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="faculty" class="col-md-4 control-label">Факультет</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="faculty" id="faculty">
                                        @foreach( $faculties as $faculty )
                                            @if( $discipline['0']->department_id == $faculty->id )
                                                <option selected value="{{ $faculty->id  }}">{{ $faculty->name }}</option>
                                            @else
                                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                <label for="department" class="col-md-4 control-label">Кафедра</label>
                                <div class="col-md-6" data-department="{{ $departments }}">
                                    <select class="form-control" name="department" id="department" >
                                        @foreach( $departments as $department )
                                            @if ( $department->faculty_id == 1 && $department->id == $discipline['0']->department_id )
                                                <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                                            @else
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Назва дисципліни</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="name" value="{{ $discipline['0']->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('academic_time') ? ' has-error' : '' }}">
                                <label for="academic_time" class="col-md-4 control-label">Кількість академічних годин</label>
                                <div class="col-md-6">
                                    <input id="academic_time" type="number" class="form-control" name="academic_time" value="{{ $discipline['0']->academic_time }}" required autofocus>
                                    @if ($errors->has('academic_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('academic_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Оновити
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

