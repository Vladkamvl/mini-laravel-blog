@extends('template.master')

@section('title', 'Admin all posts')

@section('content')
    <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary">Add post</a><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">User</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><h5><a href="{{ route('admin.blog.posts.edit', [$post->id]) }}">{{ $post->title }}</a></h5></td>
                <td><p>{{ $post->category->title }}</p></td>
                <td><p>{{ $post->user->name }}</p></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $posts->render() !!}
@endsection
