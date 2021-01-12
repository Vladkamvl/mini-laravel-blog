@extends('template/master')
@section('title', 'All Posts')

@section('content')
    @foreach($posts as $post)
        @if($loop->first)
            <div class="row">
        @endif
        <div class="col-md-4">
            <div class="card-content">
                <div class="card-img">
                    <img src="https://placeimg.com/380/230/nature" alt="">
                    <span>{{ $post->category->title }}</span>
                </div>
                <div class="card-desc">
                    <h3><a href="{{ route('blog.posts.show', [$post->id]) }}">{{ $post->title }}</a></h3>
                    <p>{{ Str::words($post->text, 20) }}...</p>
                    <a href="{{ route('blog.posts.show', [$post->id]) }}" class="btn-card">Read</a>
                </div>
            </div>
        </div>
        @if($loop->iteration % 3 == 0)
            </div><div class="row">
        @endif
    @endforeach
    </div>
    {!! $posts->render() !!}
@endsection
