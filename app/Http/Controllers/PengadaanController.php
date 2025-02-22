<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index()
    {

    $lowStockThreshold = 10;

    $lowStockBooks = Buku::with('penerbit')
        ->where('stok', '<=', $lowStockThreshold)
        ->orderBy('stok', 'asc')
        ->get();
                    
    return view('pengadaan.index', compact('lowStockBooks'));
    }
}