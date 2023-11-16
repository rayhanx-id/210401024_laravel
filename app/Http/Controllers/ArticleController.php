<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('articles.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_id = $request->input('author_id');
        $article->category_id = $request->input('category_id');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            $article->image = $imageName;
            $article->save();
        }
    
        return redirect()->route('articles.index');
    }

    public function edit($id)   
    {
        $article = Article::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_id = $request->input('author_id');
        $article->category_id = $request->input('category_id');
                
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            // Hapus gambar lama
            if ($article->image) {
                $oldImagePath = public_path('images') . '/' . $article->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $article->image = $imageName;
        }
    
        $article->save();
    
        return redirect()->route('articles.index');
    }
    

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
    
        // Hapus file gambar jika ada
        if ($article->image) {
            $imagePath = public_path('images') . '/' . $article->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $article->delete();
    
        return redirect()->route('articles.index');
    }
}
