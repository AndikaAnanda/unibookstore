<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Buku::with('penerbit');
        
        if ($search) {
            $query->where('nama_buku', 'like', "%{$search}%");
        }
        
        $books = $query->get();
        
        return view('home', compact('books', 'search'));
    }
}