@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 relative">
        <div class="flex items-center mb-6">
            <a href="{{ route('dashboard') }}" class="text-black flex items-center focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.707 10l5.147-5.146a.5.5 0 01.708.708L7.707 10l3.853 3.854a.5.5 0 01-.708.708l-5.147-5.146a.5.5 0 010-.708z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4 md:col-span-1">
                <img src="/storage/{{ $article->gambar }}" alt="" class="w-full rounded-3xl"
                    style="max-height: 500px;">
            </div>

            <div class="md:col-span-1">
                <div class="mb-4">
                    <h1 class="text-6xl font-extrabold">{{ $article->judul }}</h1>
                </div>

                <div class="mb-4 flex items-center">
                    <label for="kategori" class="block font-bold text-2xl mb-2 mr-2">Kategori article :</label>
                    <p class="mb-1 text-xl">{{ $article->kategori }}</p>
                </div>
                <div class="mb-4 flex items-center">
                    <label for="author" class="block font-bold text-2xl mb-2 mr-2">Author : </label>
                    <p class="text-xl md:text-xl text-gray-700">{{ $article->user->name }}</p>
                </div>
                <div class="mb-4 flex items-center">
                    <p class="mb-1 text-xl">{{ $article->artikel }}</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-between gap-2 mt-4">
            <!-- Facebook Share Button -->
            <div class="fb-share-button" data-href="{{ route('show', $article->id) }}" data-layout="button" data-size="large">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('show', $article->id) }}&amp;src=sdkpreparse" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12v5h4l1-5h-5z" />
                    </svg>
                    Bagikan ke Facebook
                </a>
            </div>
        
            <!-- Twitter Share Button -->
            <a class="twitter-share-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center"
               href="https://twitter.com/intent/tweet?url={{ route('show', $article->id) }}&text={{ urlencode($article->judul) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3H4a2 2 0 00-2 2v14a2 2 0 002 2h9a2 2 0 002-2V5a2 2 0 00-2-2zm-1 7h2M9 17v-4m0 0l3 3m-3-3l-3 3" />
                </svg>
                Tweet
            </a>
        
            <!-- Instagram Share Button -->
            <a class="instagram-share-button bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 px-4 rounded-lg flex items-center"
               href="https://www.instagram.com/share?url={{ route('show', $article->id) }}&title={{ urlencode($article->judul) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.95 16.46c-3.35 0-6.07-2.72-6.07-6.07s2.72-6.07 6.07-6.07 6.07 2.72 6.07 6.07-2.72 6.07-6.07 6.07zM12 7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm5 10c-.2 0-.41-.08-.56-.24-.15-.15-.24-.36-.24-.56s.08-.41.24-.56c.15-.15.36-.24.56-.24s.41.08.56.24c.15.15.24.36.24.56s-.08.41-.24.56c-.15.15-.36.24-.56.24z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Share on Instagram
            </a>
        </div>
        




        <form action="{{ route('comments.store', $article->id) }}" method="POST" class="mt-8">
            @csrf
            <textarea name="body" articles="3" class="w-full border-black bg-gray-100 rounded-md p-2"
                placeholder="Tulis komentar Anda"></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Kirim
                Komentar</button>
        </form>

        <!-- Daftar Komentar -->
        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-4">Komentar</h2>
            @foreach ($article->comments as $comment)
                <div class="bg-gray-100 p-4 rounded-md mb-2">
                    <p class="text-gray-800">{{ $comment->body }}</p>
                    <p class="text-gray-600 text-sm mt-2">Ditulis oleh {{ $comment->user->name }} pada
                        {{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Function to open the delete modal
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('block');
        }

        // Function to close the delete modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('block');
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
