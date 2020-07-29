@extends('layouts.admin')


@section('content')
<h1>Create Users</h1>

    {!! Form::open(['method'=>'POST','files'=>'true','action'=>'AdminUsersController@store']) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null , ['class' => 'form-control alert-danger']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email', null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'), 0 , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',[''=>'Choose Option'] + $roles, null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo :') !!}
        {!! Form::file('photo_id',['class'=>'form-control alert-success']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
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

