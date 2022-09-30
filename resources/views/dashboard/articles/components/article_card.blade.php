<div class="card">
    <img src="{{ asset($article->image) }}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->brief }}</p>
        <a href="{{ route('articles.show',$article->slug) }}" class="btn btn-outline-warning">
            View
        </a>
        <form method="POST" action="{{ route('articles.destroy',$article->id) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>

        <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-dark">Edit</a>
    </div>
</div>
