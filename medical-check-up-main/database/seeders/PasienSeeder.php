<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasien::create([
            'name' => 'Wahyu',
            'number_register' => 'REG-2605231300',
            'nik' => 123456789,
            'birthday' => date('d/m/Y', strtotime('1999-06-11')),
            'address' => 'Rawamangun, Jakarta Timur, Indonesia',
            'gender' => 'Laki-laki',
            'phone' => '085767113554',
            'father_name' => 'Fulan',
            'mother_name' => 'Fulanah',
        ]);

        Pasien::create([
            'name' => 'Hadoy',
            'number_register' => 'REG-2605231301',
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
