@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endsection
@section('pageheader')
    Upload Media
@endsection
@section('content')
    @include('includes.form_error')
    {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store', 'files'=>true, 'class'=>'dropzone needsclick dz-clickable']) !!}

    {!! Form::close() !!}
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@endsection