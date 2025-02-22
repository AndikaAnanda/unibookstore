<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    public function run()
    {
        $penerbits = [
            [
                'id_penerbit' => 'SP01',
                'nama' => 'Penerbit Informatika',
                'alamat' => 'Jl. Buah Batu No. 121',
                'kota' => 'Bandung',
                'telepon' => '0813-2220-1946'
            ],
            [
                'id_penerbit' => 'SP02',
                'nama' => 'Andi Offset',
                'alamat' => 'Jl. Suryalaya IX No.3',
                'kota' => 'Bandung',
                'telepon' => '0878-3903-0688'
            ],
            [
                'id_penerbit' => 'SP03',
                'nama' => 'Danendra',
                'alamat' => 'Jl Moch. Toha 44',
                'kota' => 'Bandung',
                'telepon' => '022-5201215'
            ],
        ];

        foreach ($penerbits as $penerbit) {
            Penerbit::create($penerbit);
        }
    }
}