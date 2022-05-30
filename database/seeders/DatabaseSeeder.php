<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pertanyaan;
use App\Models\SubPertanyaan;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            PertanyaanSeeder::class,
            SubPertanyaanSeeder::class,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'Administrator',
        ]);
    }
}
