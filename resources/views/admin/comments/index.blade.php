@extends('layouts.admin')
@section('pageheader')
    Posts
@endsection
@section('content')
    @if(Session::has('deleted_comment'))
        <p class="bg-danger">{{session('deleted_comment')}}</p>
    @elseif(Session::has('updated_comment'))
        <p class="bg-success">{{session('updated_comment')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->is_active}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{ str_limit($comment->body, 100, '...') }}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$comments->render()}}
        </div>
    </div>
@endsection