@extends('layouts.admin')


@section('content')
    <h1>All Posts</h1>


    @if(Session::has('deleted_post'))

    <div class="alert alert-danger">
        <p >{{ session('deleted_post') }}</p>
    </div>
    @elseif(Session::has('create_post'))

    <div class="alert alert-success">
        <p >{{ session('create_post') }}</p>
    </div>
    @elseif(Session::has('Post_update'))

    <div class="alert alert-success">
        <p >{{ session('Post_update') }}</p>
    </div>

    @endif

<table class='table'>
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Catogery</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
</thead>
<tbody>
    @if($posts)

    @foreach($posts as $post)

        <tr>
            <td>{{ $post->id }}</td>
            <td><img height=50 src="{{ URL::to('/') }}/images/{{ $post->photo ? $post->photo->file : "default.png" }}" alt=""></td>
            <td><a href="{{ route('posts.edit',$post->id) }}">{{ $post->user->name }}</a></td>
            <td>{{ $post->catogery ? $post->catogery->name : "No catogery" }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
        </tr>
    @endforeach
@endif
</tbody>

</table>

@endsection
