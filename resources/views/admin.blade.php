@extends('layouts.app')

@section('content')
    <admin-header v-bind:nav="{{ $nav }}"></admin-header>
    <admin-main></admin-main>
@endsection