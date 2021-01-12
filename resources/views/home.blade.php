@extends('template.master')

@section('title', 'Home page')

@section('content')
    <h1>Home page</h1>
    <a href="{{ route('blog.posts.index') }}">All posts</a><br>
    <a href="{{ route('admin.blog.posts.index') }}">Admin posts</a><br>
    <a href="{{ route('admin.blog.categories.index') }}">All categories</a>
@endsection
