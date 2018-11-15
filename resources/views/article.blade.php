@extends('layouts.app')

@section('content')
    <blog-aside home-route="{{ route('home') }}"
                intro="{{ $article['title'] }}"
                background="{{ config('app.url') . $article['thumbnail'] }}"
    >
    </blog-aside>
    <blog-content date="{{ $article['published_at'] }}"
                  title="{{ $article['title'] }}"
                  excerpt="{{ $article['category']['description'] }}"
                  category="{{ config('app.url') . '/c/' . $article['category']['slug'] }}"
                  content="{{ $article['content'] }}"
    >
    </blog-content>
@endsection