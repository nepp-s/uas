<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

public function store(Request $request, $article_id)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    Comment::create([
        'article_id' => $article_id,
        'user_id' => auth()->user()->id,
        'body' => $request->body,
    ]);

    return back()->with('success', 'Komentar berhasil ditambahkan');
}

}
