@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div x-data="{ searchQuery: '{{ $search ?? '' }}' }">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Buku</h1>

        <div class="mb-6">
            <form action="{{ route('home') }}" method="GET" class="flex w-full md:w-1/2">
                <input type="text" name="search" x-model="searchQuery" class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari nama buku...">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition duration-200">Cari</button>
            </form>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penerbit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($books as $book)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->id_buku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->kategori }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->nama_buku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($book->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->stok }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->penerbit->nama }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada buku yang ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection