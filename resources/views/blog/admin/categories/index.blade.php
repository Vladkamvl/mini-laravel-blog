@extends('template.master')

@section('title', 'All Categories')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><a href="{{ route('admin.blog.categories.edit', [$category->id]) }}"><h5>{{ $category->title }}</h5></a></td>
                <td><p>{{ $category->description }}</p></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->render() }}

    <a href="{{ route('admin.blog.categories.create') }}" class="btn btn-primary">Add category</a>
@endsection
