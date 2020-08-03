@extends('layouts.admin')


@section('content')
<h1>Create Posts</h1>

    {!! Form::open(['method'=>'POST','files'=>'true','action'=>['AdminPostsController@store']]) !!}


    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null , ['class' => 'form-control alert-danger']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('catogery_id','Catogery:') !!}
        {!! Form::select('catogery_id', [''=>'Choose'] + $catogery ,null, ['class' => 'form-control']) !!}
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
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

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

