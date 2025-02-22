<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $books = Buku::with('penerbit')->get();
        $publishers = Penerbit::all();
        return view('admin.index', compact('books', 'publishers'));
    }
    
    public function storeBuku(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|string|max:10|unique:bukus',
            'kategori' => 'required|string|max:50',
            'nama_buku' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_penerbit' => 'required|exists:penerbits,id_penerbit',
        ]);
        
        Buku::create($request->all());
        
        return redirect()->route('admin.index')->with('success', 'Buku berhasil ditambahkan');
    }
    
    public function updateBuku(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:50',
            'nama_buku' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_penerbit' => 'required|exists:penerbits,id_penerbit',
        ]);
        
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        
        return redirect()->route('admin.index')->with('success', 'Buku berhasil diperbarui');
    }
    
    public function deleteBuku($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        
        return redirect()->route('admin.index')->with('success', 'Buku berhasil dihapus');
    }
    
    public function storePenerbit(Request $request)
    {
        $request->validate([
            'id_penerbit' => 'required|string|max:10|unique:penerbits',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:50',
            'telepon' => 'required|string|max:20',
        ]);
        
        Penerbit::create($request->all());
        
        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil ditambahkan');
    }
    
    public function updatePenerbit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:50',
            'telepon' => 'required|string|max:20',
        ]);
        
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());
        
        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil diperbarui');
    }
    
    public function deletePenerbit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        
        // Check if any books are associated with this publisher
        if ($penerbit->bukus()->count() > 0) {
            return redirect()->route('admin.index')->with('error', 'Tidak dapat menghapus penerbit yang masih memiliki buku');
        }
        
        $penerbit->delete();
        
        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil dihapus');
    }
    
    public function publishers()
    {
        $publishers = Penerbit::all();
        return view('admin.publishers', compact('publishers'));
    }
}