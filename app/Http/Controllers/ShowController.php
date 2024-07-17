<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show')->with('article', $article);
    }
}
