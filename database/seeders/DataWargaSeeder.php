<?php

namespace Database\Seeders;

use illuminate\Support\Facades\File;
use App\Models\DataWarga;
use Illuminate\Database\Seeder;

class DataWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datawarga = json_decode(File::get("database/data/datawarga.json"));
        foreach ($datawarga as $key => $value) {
            DataWarga::create([
                'no_kk' => $value->no_kk,
                'nik' => $value->nik,
                'nama' => $value->nama,
                'alamat' => $value->alamat,
                'status_keluarga' => $value->status_keluarga,
                'status_ekonomi' => $value->status_ekonomi,
                'catatan' => $value->catatan,
                'status_survei' => $value->status_survey,

            ]);
        }
    }
}
