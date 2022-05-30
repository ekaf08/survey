<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Kecamatan;



class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = json_decode(File::get("database/data/kecamatan.json"));


        foreach ($kecamatan as $key => $value) {
            Kecamatan::create([
                'no_kec' => $value->no_kec,
                'nama_kec' => $value->nama_kec,
                'no_kab' => $value->no_kab,
                'no_prop' => $value->no_prop
            ]);
        }
    }
}
