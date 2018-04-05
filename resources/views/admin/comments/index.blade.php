@extends('layouts.admin')
@section('pageheader')
    Comments
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
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>View Post</th>
            <th>View Replies</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{ str_limit($comment->body, 100, '...') }}</td>
                    <td><a class="btn btn-primary" href="{{route('home.post',$comment->post->slug)}}" data-toggle="tooltip" title="View Post"><i class="fa fa-eye"></i></a></td>
                    <td><a class="btn btn-default" href="{{route('admin.comment.replies.show',$comment->id)}}" data-toggle="tooltip" title="View Replies"><i class="fa fa-comment"></i></a></td>
                    <td>
                        @if($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-ban"></i>',['type'=>'submit','class'=>'btn btn-info','data-toggle' => 'tooltip' ,'title'=>"Disapprove"]) !!}
                            </div>
                        {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-check-circle"></i>',['type' => 'submit','class'=>'btn btn-success','data-toggle' => 'tooltip' ,'title'=>"Approve"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::button('<i class="fa fa-trash"></i>',['type'=>'submit','class'=>'btn btn-danger','data-toggle' => 'tooltip' ,'title'=>"Delete"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
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
