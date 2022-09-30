@extends('layout')
@section('title') Manage Articles @endsection

@section('body')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-dark" href="{{ route('articles.create') }}">Add New Article</a>

        <div class="col-12 mt-3">
            @if(count($articles) == 0)
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    You have no articles yet!
                </div>
            @else
                <div class="row g-2">
                    @foreach($articles as $article)
                        <div class="col-12 col-md-4">
                            @include('dashboard.articles.components.article_card',['article'=>$article])
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection
