<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'dokter_id' => 2,
            'nik' => 123456789,
            'birthday' => date('d/m/Y', strtotime('1999-06-11')),
            'address' => 'Rawamangun, Jakarta Timur, Indonesia',
            'gender' => 'Laki-laki',
            'phone' => '085767113554',
            'father_name' => 'Fulan',
            'mother_name' => 'Fulanah',
        ]);
    }
}
