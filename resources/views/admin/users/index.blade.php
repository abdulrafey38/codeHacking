@extends('layouts.admin')



@section('content')

<h1>Users</h1>

@if(Session::has('deleted_user'))

<div class="alert alert-danger">
    <p >{{ session('deleted_user') }}</p>
</div>
@elseif(Session::has('create_user'))

<div class="alert alert-success">
    <p >{{ session('create_user') }}</p>
</div>
@elseif(Session::has('update_user'))

<div class="alert alert-success">
    <p >{{ session('update_user') }}</p>
</div>

@endif

<table class='table'>
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
</thead>
<tbody>
    @if($users)

        @foreach($users as $user)

    <tr>
    <td>{{ $user->id }}</td>
    <td>
        @if($user->photo)
        <img src="{{ URL::to('/') }}/images/{{$user->photo->file}}" alt="" height =50 class=" img-rounded">
        @else
        <img src="https://image.flaticon.com/icons/png/512/21/21104.png" alt="" height=50 class="img-rounded">
        @endif
    </td>
    <td> <a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role->name }}</td>
    @if($user->is_active == 0)
        <td>Not Active</td>
    @else
        <td>Active</td>
    @endif
    <td>{{ $user->created_at->diffForHumans() }}</td>
    <td>{{ $user->updated_at->diffForHumans() }}</td>
    </tr>
        @endforeach
    @endif
</tbody>

</table>
@endsection
