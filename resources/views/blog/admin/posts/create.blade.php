@extends('template.master')

@section('title', 'Add category')

@section('content')
    <form action="{{ route('admin.blog.posts.store') }}" method="POST">
        @method('post')
        <input type="text" value="{{ old('title') }}" name="title"><br>
        <select name="category_id">
            <option value="-1">None</option>
        @foreach($categoriesForComboBox as $category)
                <option
                    @if($category->id == old('category_id'))
                        selected
                    @endif
                    value="{{ $category->id }}">{{ $category->id_title }}</option>
        @endforeach
        </select><br>
        <textarea name="text">{{ old('text') }}</textarea><br>
        <button class="btn">Add</button>
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
