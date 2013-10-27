@extends('layouts.default')

@section('main')

    {{ Form::model('User', ['route' => 'users.store']) }}

    <div class="form-group">
        {{ Form::label('email') }}
        {{ Form::text('email') }}
    </div>

    <div class="form-group">
        {{ Form::label('password') }}
        {{ Form::password('password') }}
    </div>

    <div class="form-group">
        {{ Form::label('name') }}
        {{ Form::text('name') }}
    </div>

    {{ Form::submit('Create new user') }}

    {{ Form::close() }}

@stop
