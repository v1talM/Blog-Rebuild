@extends('layouts.app')

@section('content')
    <admin-header></admin-header>
    <article-list v-bind:articles="{{ $articles }}"></article-list>
@endsection