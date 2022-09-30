<a href="{{ route('articles.show',$article->slug) }}" class="text-dark text-decoration-none">
<div class="col-12 p-2">
    <div class="row g-2">
        <div class="col-12 col-md-auto text-center">
            <img src="{{ asset($article->image) }}" class="img-fluid" width="250" />
        </div>
        <div class="col-12 col-md">
            <div class="col-12">
                <h2 class="fw-bold">{{$article->title}}</h2>
            </div>
            <div class="col-12">
                <p>{{$article->brief}}</p>
            </div>

            <div class="col-12">
                <p><span> Published <u>{{ $article->created_at }}</u> by</span>
                  {{ $article->author->name }}
                </p>
            </div>
        </div>
    </div>
</div>
</a>
