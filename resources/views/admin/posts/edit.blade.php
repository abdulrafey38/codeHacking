@extends('layouts.admin')


@section('content')
<h1>Edit Post</h1>

<div class="col-sm-3">

    @if($post->photo)
    <img src="{{ URL::to('/') }}/images/{{$post->photo->file}}" alt="" class="img-responsive img-rounded">
    @else
    <img src="{{ URL::to('/') }}/images/default.png" alt="" class="img-responsive img-rounded">
    @endif

</div>


<div class="col-sm-9">

    <div>
    {!! Form::model($post,['method'=>'PATCH','files'=>'true','action'=>['AdminPostsController@update',$post->id]]) !!}


    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null , ['class' => 'form-control alert-danger']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('catogery_id','Catogery:') !!}
        {!! Form::select('catogery_id',  $catogery ,null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Picture To Post:') !!}
        {!! Form::file('photo_id' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body',null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'Delete','action'=>['AdminPostsController@destroy',$post->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete.',['class'=>'btn btn-danger col-sm-6']) !!}
    </div>
    {!! Form::close() !!}
    </div>
</div>

    @if(count($errors)>0)
        <div class="alert alert-danger" role="atert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{  $error  }}
                </li>
                @endforeach
            </ul>
        </div>

    @endif
    @endsection

