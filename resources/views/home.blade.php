@extends('layouts.app')

@section('content')
    <blog-aside home-route="{{ route('home') }}"
                intro="{{ config('blog.self-intro') }}"
                background="https://unsplash.it/600/800/?random&gravity=center"
    >

    </blog-aside>
    <blog-main v-bind:articles="{{ $articles }}"></blog-main>
    <blog-goto-top></blog-goto-top>
@endsection
