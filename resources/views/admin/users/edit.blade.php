@extends('layouts.admin')
@section('pageheader')
    Edit User - {{ $user->name }}
@endsection
@section('content')
    @include('includes.form_error')
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
            {!! Form::select('is_active', array(0 => 'Not Active',1 =>'Active'), null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update User',['class'=>'btn btn-primary pull-left']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id],'class'=>'pull-right']) !!}
            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection