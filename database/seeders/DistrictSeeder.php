<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = array(
            array(
                "id" => 1,
                "name" => "Nhà Bè",
                "city_id" => 11,
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
        );

        District::insert($districts);

    }
}
