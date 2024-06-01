<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            'Hà Nội',
            'Hồ Chí Minh',
            'Đà Nẵng',
            // Thêm tất cả các thành phố khác ở đây
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
