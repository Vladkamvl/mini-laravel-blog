@extends('template.master')

@section('title', 'Add category')

@section('content')
    <form action="{{ route('admin.blog.categories.store') }}" method="POST">
        @method('post')
        <input type="text" name="title"><br>
        <textarea name="description"></textarea><br>
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

