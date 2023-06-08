<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            "HTML",
            "CSS",
            "BOOTSTRAP",
            "JAVASCRIPT",
            "VUE-JS",
            "VITE",
            "SCSS",
            "PHP",
            "MYSQL",
            "LARAVEL",
        ];
        foreach ($technologies as $technology) {
            $newTechnology = New Technology();
            $newTechnology -> name = $technology;
            $newTechnology -> slug = Str::slug($newTechnology->name, '-');
            $newTechnology -> save();
        }
    }
}
