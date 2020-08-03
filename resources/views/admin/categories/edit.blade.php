@extends('layouts.admin')



@section('content')

<h1>Edit Catogeries</h1>



<div class="col-sm-6">
    {!! Form::model($catogery,['method'=>'PATCH','files'=>'true','action'=>['AdminCatogeriesController@update',$catogery->id]]) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null , ['class' => 'form-control alert-info']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Catogery', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>
    {!! Form::close() !!}


    {!! Form::open(['method'=>'Delete','action'=>['AdminCatogeriesController@destroy',$catogery->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete.',['class'=>'btn btn-danger col-sm-6']) !!}
    </div>
    {!! Form::close() !!}

</div>



@endsection
