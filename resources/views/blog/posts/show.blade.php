@extends('template/master')

@section('title', 'Post id#' . $post->id)

@section('content')
    <h3>{{ $post->title }}</h3>
    <h4>{{ $post->category->title }}</h4>
    <p>{{ $post->text }}</p>
@endsection
