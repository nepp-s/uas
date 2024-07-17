<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            $article = Article::all();
        } else {
            $article = Article::where('judul', 'like', '%' . $search . '%')->get();
        }

        return view('dashboard', compact('article'));
    }
     
}
