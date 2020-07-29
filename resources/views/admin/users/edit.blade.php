@extends('layouts.admin')


@section('content')
<h1>Edit Users</h1>

<div class="col-sm-3">

        @if($user->photo)
        <img src="{{ URL::to('/') }}/images/{{$user->photo->file}}" alt="" class="img-responsive img-rounded">
        @else
        <img src="https://image.flaticon.com/icons/png/512/21/21104.png" alt="" class="img-responsive img-rounded">
        @endif

</div>

<div class="col-sm-9">

    {!! Form::model($user , ['method'=>'PATCH','files'=>'true','action'=>['AdminUsersController@update',$user->id]]) !!}


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
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'), null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',$roles, null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo :') !!}
        {!! Form::file('photo_id',['class'=>'form-control alert-success']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
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

