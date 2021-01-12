@extends('template.master')

@section('title', 'Edit category id#' . $category->id)

@section('content')
    <form action="{{ route('admin.blog.categories.update', [$category->id]) }}" method="POST">
        @method('patch')
        <input type="text" value="{{ $category->title }}" name="title"><br>
        <textarea name="description">{{ $category->description }}</textarea><br>
        <button class="btn">Update</button>
        @csrf
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
