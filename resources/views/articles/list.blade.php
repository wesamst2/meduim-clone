<div class="container">
    @foreach($articles as $article)
        @include('articles.components.article_card',['article'=>$article])
    @endforeach

    {{ $articles->links() }}
</div>
