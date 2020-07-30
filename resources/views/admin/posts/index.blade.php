@extends('layouts.admin')


@section('content')
    <h1>All Posts</h1>



<table class='table'>
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
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
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->catogery_id }}</td>
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
