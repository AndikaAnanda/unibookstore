@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <div x-data="{ activeTab: 'books' }">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Panel</h1>
        
        <div class="mb-6 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <button @@click="activeTab = 'books'" :class="activeTab === 'books' ? 'border-blue-600 text-blue-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600'" class="inline-block py-4 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                        Manajemen Buku
                    </button>
                </li>
                <li class="mr-2">
                    <button @@click="activeTab = 'publishers'" :class="activeTab === 'publishers' ? 'border-blue-600 text-blue-600' : 'border-transparent hover:border-gray-300 hover:text-gray-600'" class="inline-block py-4 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                        Manajemen Penerbit
                    </button>
                </li>
            </ul>
        </div>
        
        <!-- Books Tab -->
        <div x-show="activeTab === 'books'" x-transition>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Daftar Buku</h2>
                <button @@click="$refs.addBookModal.classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-200">
                    Tambah Buku
                </button>
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
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button @@click="$refs.editBookModal{{ $book->id_buku }}.classList.remove('hidden')" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                        Edit
                                    </button>
                                    <button @@click="$refs.deleteBookModal{{ $book->id_buku }}.classList.remove('hidden')" class="text-red-600 hover:text-red-900">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Edit Book Modal -->
                            @include('admin.modals.edit-book')
                            
                            <!-- Delete Book Modal -->
                            @include('admin.modals.delete-book')
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada buku yang ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Add Book Modal -->
            @include('admin.modals.add-book')
        </div>
        
        <!-- Publishers Tab -->
        <div x-show="activeTab === 'publishers'" x-transition>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Daftar Penerbit</h2>
                <button @@click="$refs.addPublisherModal.classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-200">
                    Tambah Penerbit
                </button>
            </div>
            
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Penerbit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($publishers as $publisher)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $publisher->id_penerbit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $publisher->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $publisher->alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $publisher->kota }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $publisher->telepon }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button @@click="$refs.editPublisherModal{{ $publisher->id_penerbit }}.classList.remove('hidden')" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                        Edit
                                    </button>
                                    <button @@click="$refs.deletePublisherModal{{ $publisher->id_penerbit }}.classList.remove('hidden')" class="text-red-600 hover:text-red-900">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Edit Publisher Modal -->
                            @include('admin.modals.edit-publisher')
                            
                            
                            <!-- Delete Publisher Modal -->
                            @include('admin.modals.delete-publisher')
                            
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada penerbit yang ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Add Publisher Modal -->
            @include('admin.modals.add-publisher')
        </div>
    </div>
@endsection