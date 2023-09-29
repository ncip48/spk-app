<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::insert([
            [
                'nip' => '11223344',
                'nama' => 'John Doe',
                'kehadiran' => 20,
                'kemampuan' => 89,
                'kinerja' => 90,
                'keaktifan' => 70,
                'kontribusi' => 80,
                'cuti' => 0,
            ],
            [
                'nip' => '55667788',
                'nama' => 'Lorem Ipsum',
                'kehadiran' => 19,
                'kemampuan' => 80,
                'kinerja' => 60,
                'keaktifan' => 50,
                'kontribusi' => 50,
                'cuti' => 2,
            ],
            [
                'nip' => '99112233',
                'nama' => 'Dolor Amet',
                'kehadiran' => 15,
                'kemampuan' => 60,
                'kinerja' => 60,
                'keaktifan' => 60,
                'kontribusi' => 60,
                'cuti' => 0,
            ],
            [
                'nip' => '44556677',
                'nama' => 'Sit Dolor',
                'kehadiran' => 20,
                'kemampuan' => 95,
                'kinerja' => 95,
                'keaktifan' => 90,
                'kontribusi' => 88,
                'cuti' => 0,
            ],
            [
                'nip' => '88991122',
                'nama' => 'Sir Alex',
                'kehadiran' => 18,
                'kemampuan' => 85,
                'kinerja' => 93,
                'keaktifan' => 90,
                'kontribusi' => 80,
                'cuti' => 3,
            ],
            [
                'nip' => '33445566',
                'nama' => 'Miss Surv',
                'kehadiran' => 18,
                'kemampuan' => 78,
                'kinerja' => 88,
                'keaktifan' => 88,
                'kontribusi' => 66,
                'cuti' => 0,
            ],
            [
                'nip' => '77889911',
                'nama' => 'John Dir',
                'kehadiran' => 19,
                'kemampuan' => 90,
                'kinerja' => 90,
                'keaktifan' => 90,
                'kontribusi' => 90,
                'cuti' => 4,
            ],
            [
                'nip' => '22334455',
                'nama' => 'Miss Smith',
                'kehadiran' => 17,
                'kemampuan' => 88,
                'kinerja' => 88,
                'keaktifan' => 77,
                'kontribusi' => 88,
                'cuti' => 1,
            ],
        ]);
    }
}
