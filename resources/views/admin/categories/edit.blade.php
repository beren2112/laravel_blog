@extends('layouts.admin')
@section('pageheader')
    Edit Category - {{ $category->name }}
@endsection
@section('content')
    @include('includes.form_error')
    {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update', $category->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:' )!!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary pull-left']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger pull-right']) !!}
    </div>
    {!! Form::close() !!}
@endsection
