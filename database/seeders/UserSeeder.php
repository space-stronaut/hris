<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ronald',
            'email' => 'abelr6099@gmail.com',
            'password' => bcrypt(123456),
            'role_id' => 1,
            'office_id' => 1,
            'place_of_birth' => 'Subang',
            'date_of_birth' => now(),
            'gender' => 'L',
            'address' => 'Subang',
            'domicile' => 'Subang',
            'religion' => 'Islam',
            'citizen' => 'Jawa Barat',
            'mother_name' => 'Tutin',
            'position' => 'Staff',
            'education' => 'S1',
            'phone' => '089501860576',
            'account_number' => 321312,
            'npwp' => 12345,
            'foto_ktp' => null,
            'poto_profile' => null,
            'status' => 'aktif',
            'join_date' => now(),
            'out_date' => null
        ]);
    }
}
