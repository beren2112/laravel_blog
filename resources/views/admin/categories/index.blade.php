@extends('layouts.admin')
@section('pageheader')
    Categories
@endsection
@section('content')
    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
    @elseif(Session::has('updated_category'))
        <p class="bg-success">{{session('updated_category')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{--{{$categories->render()}}--}}
        </div>
    </div>
@endsection