<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('user_id',auth()->id())->get();

        return response()->view('dashboard.articles.manage',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $edit = false;

        return response()->view('dashboard.articles.create_edit',compact('tags','edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->brief = $request->brief;
        $article->description = $request->description;
        $article->image = $this->upload($request,'image');
        $article->user_id = auth()->id();
        $article->save();
        foreach ($request->tags as $id)
        {
            $tag = Tag::where('title', $id)->first();
            if($tag != null)
            {
                $article->tags()->attach($tag->id);
            }else{
                $tag = new Tag();
                $tag->title = $id;
                $tag->save();

                $article->tags()->attach($tag->id);
            }
        }

        return redirect('/articles/manage')->with('status', 'Article added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->view('articles.view',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $edit = true;

        return response()->view('dashboard.articles.create_edit',compact('tags','edit','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->brief = $request->brief;
        $article->description = $request->description;

        if($request->hasFile('image')) $article->image = $this->upload($request,'image');

        $article->save();

        $article->tags()->detach();
        foreach ($request->tags as $id)
        {
            $tag = Tag::where('title', $id)->first();
            if($tag != null)
            {
                $article->tags()->attach($tag->id);
            }else{
                $tag = new Tag();
                $tag->title = $id;
                $tag->save();

                $article->tags()->attach($tag->id);
            }
        }

        return redirect('/articles/manage')->with('status', 'Article added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('status','Article deleted successfully!');
    }

    public function upload_ckeditor(Request $request)
    {
        $url = $this->upload($request,'upload');

        return $url != null? response()->json(['url'=>$url]) : null;
    }
}
