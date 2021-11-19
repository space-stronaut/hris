<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'name' => 'Bakri',
            'address' => 'Jl.Sk',
            'phone' => '089501860576'
        ]);
    }
}
