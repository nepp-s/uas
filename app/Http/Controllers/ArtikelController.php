<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index()
    {
        $article = Article::with('user')->get();
        return view('addArtikel', compact('article'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'kategori' => 'required|string',
            'artikel' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $Article = new Article();
            $Article->judul = $request->judul;
            $Article->gambar = $request->gambar->store('image', 'public');
            $Article->kategori = $request->kategori;
            $Article->artikel = $request->artikel;
            $Article->author_id = Auth::id();
            $Article->save();
            return redirect()->route('dashboard')->with('success', 'Article Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data['article'] = Article::findOrFail($id);
        return view('editArtikel', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'kategori' => 'required|string',
            'artikel' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $article = Article::findOrFail($id);
            $article->judul = $request->judul;
            $article->kategori = $request->kategori;
            $article->artikel = $request->artikel;

            if ($request->hasFile('gambar')) {
                // Delete the old image if exists
                if ($article->gambar) {
                    \Storage::disk('public')->delete($article->gambar);
                }

                // Store the new image
                $article->gambar = $request->file('gambar')->store('images', 'public');
            }

            $article->save();

            return redirect()->route('dashboard')->with('success', 'Article updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('dashboard')->with('success', 'Article deleted successfully');
    }
}
