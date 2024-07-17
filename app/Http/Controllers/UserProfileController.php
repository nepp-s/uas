<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::check() ? Auth::user() : Auth::user();
        $articles = Article::where('id', $user->id)->get();

        return view('profile', compact('user', 'articles'));
    }
}
