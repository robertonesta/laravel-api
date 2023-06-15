<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "Front End",
            "Back End",
            "Full Stack"
        ];
        foreach ($types as $type) {
            $newType = New Type();
            $newType -> name = $type;
            $newType -> user_id = 1;
            $newType -> save();
        }
    }
}
