<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pertanyaan = json_decode(File::get("database/data/pertanyaan.json"));
        foreach ($pertanyaan as $key => $value) {
            Pertanyaan::create([
                'pertanyaan' => $value->pertanyaan,
            ]);
        }
    }
}
