@extends('layout')
@section('title') {{$article->title}} @endsection
@section('body')
    <div class="container">
        <!--Section: Post data-mdb-->
        <section class="border-bottom mb-4">
            <img src="{{ asset($article->image) }}"
                 class="col-12 shadow-2-strong mb-4" alt="" />

            <div class="row align-items-center mb-4">
                <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
{{--                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg" class="rounded-5 shadow-1-strong me-2"--}}
{{--                         height="35" alt="" loading="lazy" />--}}
                    <span> Published <u>{{ $article->created_at }}</u> by</span>
                    {{ $article->author->name }}
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    @foreach($article->tags as $tag)
                        <button type="button" class="btn btn-dark px-3 me-1">
                            {{$tag->title}}
                        </button>
                    @endforeach

                </div>
            </div>
        </section>
        <!--Section: Post data-mdb-->

        <!--Section: Text-->
        <section class="text-justify">
            {!! $article->description !!}
        </section>
        <!--Section: Text-->


    </div>
@endsection
