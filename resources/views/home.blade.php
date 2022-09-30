@extends('layout')
@section('title') Home Page @endsection


@section('body')
    @include('articles.list',['articles'=>$articles])
@endsection
