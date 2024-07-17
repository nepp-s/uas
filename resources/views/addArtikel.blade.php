@extends('layouts.app')

@section('content')
<section class="max-w-4xl p-6 mx-auto bg-sky-500 rounded-md shadow-md dark:bg-gray-800 mt-20">
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">Account settings</h1>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        <div class="grid grid-cols-1 gap-6 mt-4 ">
            <div>
                <label class="text-white dark:text-gray-200" for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                name="judul" placeholder="Cth: Memakan roti" value="{{ old('judul') }}" required>
                @error('judul')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="kategori">Kategori</label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="Akademik">Akademik</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pendidikan">Pendidikan</option>
                </select>
                @error('kategori')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <div>
                <label class="text-white dark:text-gray-200" for="artikel">Artikel</label>
                <textarea class="form-control @error('artikel') is-invalid @enderror block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                name="artikel" placeholder="Cth: Memakan roti" required>{{ old('artikel') }}</textarea>
                @error('artikel')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white">
                Image
                </label>
                <label for="gambar" class="w-full cursor-pointer">
                    <div id="imagePreview"
                        class="bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-lg text-center hover:bg-white h-48 flex flex-col items-center justify-center">
                        <i class="fas fa-image fa-5x mb-2"></i>
                        <p class="mt-2">Choose an image</p>
                    </div>
                    <input type="file" name="gambar" id="gambar" class="hidden" onchange="previewImage(event)">
                </label>
                @error('gambar')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

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
