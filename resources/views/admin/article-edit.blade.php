@extends('layouts.app')

@section('content')
    <admin-header></admin-header>
    <article-edit v-bind:article="{{ $article }}" v-bind:categories="{{ $categories }}"></article-edit>
@endsection