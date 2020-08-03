@extends('layouts.admin')



@section('content')

<h1>Catogeries</h1>

@if(Session::has('deleted_catogery'))

<div class="alert alert-danger">
    <p >{{ session('deleted_catogery') }}</p>
</div>
@elseif(Session::has('create_catogery'))

<div class="alert alert-success">
    <p >{{ session('create_catogery') }}</p>
</div>
@elseif(Session::has('update_catogery'))

<div class="alert alert-success">
    <p >{{ session('update_catogery') }}</p>
</div>

@endif

<div class="col-sm-6">
    {!! Form::open(['method'=>'POST','files'=>'true','action'=>'AdminCatogeriesController@store','files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null , ['class' => 'form-control alert-info']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Catogery', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>


<div class="col-sm-6">


<table class='table'>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
    </tr>
</thead>
<tbody>
    @if($catogery)

        @foreach($catogery as $cat)

    <tr>
    <td>{{ $cat->id }}</td>
    <td> <a href="{{ route('catogeries.edit',$cat->id) }}">{{ $cat->name }}</a></td>
    <td>{{ $cat->created_at->diffForHumans() }}</td>
    </tr>
        @endforeach
    @endif
</tbody>

</table>
</div>
@endsection
