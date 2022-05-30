<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Kelurahan;



class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelurahan = json_decode(File::get("database/data/kelurahan.json"));
        foreach ($kelurahan as $key => $value) {
            Kelurahan::create([
                'no_kel' => $value->no_kel,
                'nama_kel' => $value->nama_kel,
                'no_kec' => $value->no_kec,
                'no_kab' => $value->no_kab,
                'no_prop' => $value->no_prop,
            ]);
        }
    }
}
