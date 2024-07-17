@extends('layouts.app')

@section('content')
<div class="relative bg-gray-200 h-auto">
    <img src="/storage/image/jumbotron.jpg" alt="Large Image" class="object-cover object-center w-full h-80">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
        <div class="border-8 border-white p-8">
            <h1 class="text-4xl md:text-8xl font-bold mb-4">ARTIKEL</h1>
        </div>
    </div>
</div>
<div class="relative mx-auto">
    <h1 class="text-2xl md:text-4xl font-bold text-center text-gray mb-8 bg-primary p-4">So, Be Healthy For Yourself
        Hari Ini</h1>
    <div class="container mx-auto mb-4 mt-10 flex justify-between items-center">
        <div class="w-full lg:w-2/1">
            <form id="searchForm" method="GET" action="{{ route('dashboard') }}">
                <div class="lg:flex items-center">
                    <input type="text" name="search" placeholder="Search..."
                        class="lg:mr-2 px-4 py-2 border bg-primary border-secondary rounded-md focus:outline-none focus:border-secondary flex-1 mb-2 lg:mb-0">
                </div>
            </form>
        </div>
        <div class="w-full lg:w-2/12 flex justify-end">
            <button type="button"
                class="flex items-center px-4 py-2 bg-gray-200 text-black rounded-md hover:bg-primary focus:outline-none "><a
                    href="{{ route('artikel') }}">Tambah Data</a>

                <svg class="h-4 w-4 inline-block ml-1 -mt-0.3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-6-6h12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <div class="w-full my-4"></div>
    <h1 class="flex justify-center text-center text-3xl font-bold mb-6">Artikel Terbaru</h1>
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 gap-8">
        @foreach ($article as $row)
            <div class="w-full p-4">
                <div class="bg-primary shadow-lg rounded-3xl p-4 flex flex-col md:flex-row">
                    <div class="md:w-1/2 flex items-center justify-center">
                        <img src="/storage/{{ $row->gambar }}" alt="Image" class="rounded-lg w-full h-full object-cover md:h-auto md:max-h-60">
                    </div>
                    <div class="md:w-1/2 md:pl-4 flex flex-col justify-center">
                        <h2 class="text-lg md:text-xl font-bold mb-1 mt-4 md:mt-0 text-black">{{ $row->judul }}</h2>
                        <p class="text-sm md:text-base text-gray-700">{{ $row->kategori }}</p>
                        <p class="text-sm md:text-base text-gray-700">Author: {{ $row->user->name}}</p>
                        <div class="flex justify-between gap-2 mt-4">
                            <button class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-lg w-full">
                                <a href="{{ route('show', $row->id)}}">Lihat Selengkapnya</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
