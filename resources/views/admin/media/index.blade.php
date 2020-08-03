@extends('layouts.admin')




@section('content')

<h1>Media</h1>

   <table class = 'table'>
       <thead>
           <tr>
               <th>Id</th>
               <th>Name</th>
               <th>Created</th>
               <th>Action</th>
           </tr>
       </thead>
    @if($photos)
       <tbody>
        @foreach($photos as $pic)

           <tr>
               <td>{{ $pic->id }}</td>
               <td><img width = 50 src= "{{ URL::to('/') }}/images/{{ $pic->file ? $pic->file : "default.png" }}" alt=""></td>
               <td>{{ $pic->created_at }}</td>
               <td>
                   {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$pic->id]]) !!}

                   {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                   {!! Form::close() !!}
               </td>
           </tr>

        @endforeach
       </tbody>
    @endif
    </table>

@stop
