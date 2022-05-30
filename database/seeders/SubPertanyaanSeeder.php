<?php

namespace Database\Seeders;

use App\Models\SubPertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

// namespace Illuminate\Contracts\Filesystem;


class SubPertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_pertanyaan = json_decode(File::get("database/data/subpertanyaan.json"));
        foreach ($sub_pertanyaan as $key => $value) {
            SubPertanyaan::create([
                'pertanyaan_id' => $value->pertanyaan_id,
                'sub_pertanyaan' => $value->sub_pertanyaan,
            ]);
        }
    }
}
