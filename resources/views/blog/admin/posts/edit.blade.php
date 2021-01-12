@extends('template.master')

@section('title', 'Add category')

@section('content')
    <form action="{{ route('admin.blog.posts.update', [$post->id]) }}" method="POST">
        @method('patch')
        <input type="text" value="{{ $post->title }}" name="title"><br>
        <textarea name="text">{{ $post->text }}</textarea><br>
        <button class="btn">Update</button>
        @csrf
    </form>
@endsection
