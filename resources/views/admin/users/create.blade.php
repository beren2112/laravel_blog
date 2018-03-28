@extends('layouts.admin')
@section('pageheader')
    Create User
@endsection
@section('content')
@include('includes.form_error')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'files'=>true]) !!}
    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group {{ $errors->has('role_id') ? 'has-error' :'' }}">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', array(''=>'Choose Options')+$roles,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group {{ $errors->has('is_active') ? 'has-error' :'' }}">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(0 => 'Not Active',1 =>'Active'), 0, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection