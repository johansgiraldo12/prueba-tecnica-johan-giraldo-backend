<?php

namespace Database\Seeders;

use App\Models\UserCategory;
use Illuminate\Database\Seeder;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'CLIENTE',
            ],
            [
                'name' => 'PROVEEDOR',
            ],
            [
                'name' => 'FUNCIONARIO INTERNO',
            ]
        ];

        foreach ($data as $info) {
            UserCategory::create($info);
        }
    }
}
