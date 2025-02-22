@extends('layouts.app')

@section('title', 'Pengadaan')

@section('content')
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Buku yang Perlu Di Re-Stock</h1>
        
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penerbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($lowStockBooks as $book)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->id_buku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->kategori }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->nama_buku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->penerbit->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold {{ $book->stok <= 10 ? 'text-red-600' : 'text-yellow-600' }}">
                                {{ $book->stok }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada buku yang memerlukan pengadaan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection