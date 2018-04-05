@extends('layouts.admin')
@section('pageheader')
    Posts
@endsection
@section('content')
    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @elseif(Session::has('updated_post'))
        <p class="bg-success">{{session('updated_post')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td> <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a></td>
                    <td>{{ str_limit($post->body, 100, '...') }}</td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection