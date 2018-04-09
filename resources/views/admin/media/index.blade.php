@extends('layouts.admin')
@section('pageheader')
    Media
@endsection
@section('content')
    @if(Session::has('deleted_media'))
        <p class="bg-danger">{{session('deleted_media')}}</p>
    @elseif(Session::has('uploaded_media'))
        <p class="bg-success">{{session('uploaded_media')}}</p>
    @endif
    @if($photos)
        {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@deleteMedia']) !!}
        <div class="form-group">
            {!! Form::select('options',['' => 'Delete Media'],null, ['name'=>"checkBoxArray", 'class'=>"form-control", 'id'=>'']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
        </div>
        <table class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td><input type="checkbox" class="mediaCheckBox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td> <img height="50" src="{{$photo->file}}" alt="" ></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group dlt-btn">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            {!! Form::close() !!}
        @endif
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
           $('#options').click(function() {
               if(this.checked){
                   $('.mediaCheckBox').each(function(){
                       this.checked = true;
                   })
                   $('.dlt-btn').fadeOut('slow');
               }
               else{
                   $('.mediaCheckBox').each(function(){
                       this.checked = false;
                   })
                   $('.dlt-btn').fadeIn('slow');
               }
           });
        });
    </script>
@endsection
