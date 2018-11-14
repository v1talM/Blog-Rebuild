@extends('layouts.app')

@section('content')
    <blog-aside home-route="{{ route('home') }}"
                intro="文章分类 - {{ $cate->description }}"
                background="{{ asset("imgs/{$cate->slug}.jpg") }}"

    >
    </blog-aside>
    <blog-main v-bind:articles="{{ $articles }}"></blog-main>
    <blog-goto-top></blog-goto-top>
@endsection