@extends('layouts.admin')
@section('pageheader')
    Create Category
@endsection
@section('content')
    @include('includes.form_error')
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:' )!!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection