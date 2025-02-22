<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model {
    use HasFactory;
    
    protected $primaryKey = 'id_penerbit';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'id_penerbit',
        'nama',
        'alamat',
        'kota',
        'telepon'
    ];
    
    public function bukus()
    {
        return $this->hasMany(Buku::class, 'id_penerbit', 'id_penerbit');
    }
}