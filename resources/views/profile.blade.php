@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 relative">
    <div class="flex items-center mb-6">
        <button class="flex items-center text-black focus:outline-none">
            <a href="{{ route('dashboard') }}" class="text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.707 10l5.147-5.146a.5.5 0 01.708.708L7.707 10l3.853 3.854a.5.5 0 01-.708.708l-5.147-5.146a.5.5 0 010-.708z" clip-rule="evenodd" />
                </svg>
            </a>
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="mb-4 md:col-span-1">
            <img src="/storage/{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }}" class="w-full rounded-3xl" style="max-height: 500px;">
        </div>

        <div class="md:col-span-1">
            <div class="relative mb-4">
                <h1 class="text-6xl font-extrabold">{{ Auth::user()->name }}</h1>
            </div>
            <div class="mb-4 flex items-center">
                <label for="email" class="block font-bold text-2xl mb-2 mr-2">Email :</label>
                <p class="mb-1 text-xl">{{ Auth::user()->email }}</p>
            </div>
            <div class="flex items-center">
                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded">Log Out</button>
                </form>
            </div>
        </div>
    </div>

    <<div class="mt-12">
            <h2 class="text-4xl font-bold mb-6">My Articles</h2>
            <div class="grid grid-cols-1 gap-8">
                @foreach ($articles as $article)
                    <div class="w-full p-4">
                        <div class="bg-primary shadow-lg rounded-3xl p-4 flex flex-col md:flex-row">
                            <div class="md:w-1/2 flex items-center justify-center">
                                <img src="/storage/{{ $article->gambar }}" alt="Image"
                                    class="rounded-lg w-full h-full object-cover md:h-auto md:max-h-60">
                            </div>
                            <div class="md:w-1/2 md:pl-4 flex flex-col justify-center">
                                <h2 class="text-lg md:text-xl font-bold mb-1 mt-4 md:mt-0 text-black">{{ $article->judul }}
                                </h2>
                                <p class="text-sm md:text-base text-gray-700">{{ $article->kategori }}</p>
                            </div>
                            <div class="flex justify-center gap-2 mt-4 md:mt-0 ">
                                <button class="bg-red-500 hover:bg-black text-white font-bold py-2 px-4 rounded-lg w-full h-fit text-center"
                                    onclick="openDeleteModal({{ $article->id }})">Delete</button>
                                <a href="{{ route('artikel.edit', $article->id) }}"
                                    class="bg-green-500 hover:bg-black text-white font-bold py-2 px-4 rounded-lg w-3/4 h-fit text-center">Edit</a>
                                    <a href="{{ route('show', $article->id) }}"
                                        class="bg-blue-500 hover:bg-black text-white font-bold py-2 px-4 rounded-lg w-3/4 h-fit text-center">Show</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-gray-500 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-xl leading-6 font-bold text-red-500" id="modal-headline">
                                Peringatan!</h3>
                            <div class="mt-4">
                                <p class="text-center text-sm text-black">Apakah Anda yakin ingin
                                    menghapus artikel ini? Tindakan ini tidak dapat dibatalkan dan akan menghapus
                                    artikel secara permanen dari sistem.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-500 px-4 py-3 sm:px-6 sm:flex sm:flex-article-reverse justify-center">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Hapus</button>
                    </form>
                    <button onclick="closeDeleteModal()"
                        class="mt-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function openDeleteModal(articleId) {
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = '/artikel/' + articleId;

            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('block');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('block');
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

@endsection
