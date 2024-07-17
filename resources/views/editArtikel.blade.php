@extends('layouts.app')

@section('content')
<section class="max-w-4xl p-6 mx-auto bg-sky-500 rounded-md shadow-md dark:bg-gray-800 mt-20">
    <button class="flex items-center text-black focus:outline-none">
        <a href="{{ route('dashboard') }}" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.707 10l5.147-5.146a.5.5 0 01.708.708L7.707 10l3.853 3.854a.5.5 0 01-.708.708l-5.147-5.146a.5.5 0 010-.708z" clip-rule="evenodd" />
            </svg>
        </a>
    </button>
    <h1 class="text-xl font-bold text-white capitalize dark:text-white text-center">Edit Article</h1>
    <form action="{{ route('artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 mt-4 ">
            
            <div>
                <label class="text-white dark:text-gray-200" for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                name="judul" placeholder="Cth: Memakan Oti" value="{{ old('judul', $article->judul) }}" required>
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="kategori">Kategori</label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="Akademik" {{ $article->kategori == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="Olahraga" {{ $article->kategori == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="Kesehatan" {{ $article->kategori == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                    <option value="Pendidikan" {{ $article->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                </select>
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="artikel">Artikel</label>
                <input type="text" class="form-control @error('artikel') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                name="artikel" placeholder="Cth: Memakan Oti" value="{{ old('artikel', $article->artikel) }}" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-white">
                    Current Image
                </label>
                <div class="w-full h-48">
                    <img src="/storage/{{ $article->gambar }}" alt="Current Image" class="rounded-lg w-full h-full object-cover">
                </div>
                <label class="block text-sm font-medium text-white mt-4">
                    Change Image
                </label>
                <label for="gambar" class="w-full cursor-pointer">
                    <div id="imagePreview" class="bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-lg text-center hover:bg-white h-48 flex flex-col items-center justify-center">
                        <i class="fas fa-image fa-5x mb-2"></i>
                        <p class="mt-2">Choose an image</p>
                    </div>
                    <input type="file" name="gambar" id="gambar" class="hidden" onchange="previewImage(event)">
                </label>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        var imagePreview = document.getElementById('imagePreview');

        reader.onload = function() {
            imagePreview.innerHTML = '<img src="' + reader.result + '" class="w-full h-full rounded-lg">';
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection
