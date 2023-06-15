<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = 
        [
            ['Laravel API', 2, 'uploads/Laravel_API.jpg', 'https://github.com/robertonesta/laravel-api', '2023-06-23'],
            ['Mulino Bianco', 2, 'uploads/Mulino_bianco.jpg', 'https://github.com/robertonesta/laravel-mulino_bianco' , '2023-05-31'],
            ['Avada Food', 1, 'uploads/Avada_food.jpg', 'https://github.com/robertonesta/proj-html-vuejs', '2023-05-23'],
            ['DC Comics', 3, 'uploads/DC_comics.jpg', 'https://github.com/robertonesta/laravel-dc-comics', '2023-05-23'],
            ['Boolflix',  1, 'uploads/Netflix.jpg', 'https://github.com/robertonesta/vite-boolflix', '2023-04-21'],
            ['Yu-Gi-Oh!', 1, 'uploads/Yu-Gi-Oh!.jpg', 'https://github.com/robertonesta/vite-yu-gi-oh', '2023-04-18'],
            ['Whatsapp', 1, 'uploads/Boolzapp.jpg', 'https://github.com/robertonesta/vue-boolzapp', '2023-03-31'],
            ['Slider', 1, 'uploads/Slider.jpg', 'https://github.com/robertonesta/vue-slider', '2023-03-29'],
            ['Social Posts', 1, 'uploads/Social_posts.jpg', 'https://github.com/robertonesta/js-social-posts', '2023-03-24'],
            ['Campo Minato', 1, 'uploads/Campo_minato.jpg', 'https://github.com/robertonesta/js-campominato-dom', '2023-03-20'],
            ['Fizzbuzz', 1, 'uploads/Fizzbuzz.jpg', 'https://github.com/robertonesta/js-fizzbuzz', '2023-03-10'],
            ['Dashboard', 1, 'uploads/Dashboard.jpg', 'https://github.com/robertonesta/html-css-bootstrap-dashboard', '2023-03-02'],
            ['Spotify Web', 1, 'uploads/Spotify.jpg', 'https://github.com/robertonesta/html-css-spotifyweb', '2023-02-24'],
            ['Dropbox', 1, 'uploads/Dropbox.jpg', 'https://github.com/robertonesta/htmlcss-dropbox', '2023-02-16'],
            ['Boolando', 1, 'uploads/Boolando.jpg', 'https://github.com/robertonesta/html-css-boolando', '2023-02-08']
        ];

        foreach ($projects as $project) { 
            $newProject = new Project();
            $newProject->title = $project[0];
            $newProject->type_id = $project[1];
            $newProject->Image = $project[2];
            $newProject->repo = $project[3];
            $newProject->slug = Project::createSlug($project->title);
            $newProject->date = $Project[4];
            $newProject->save();
        };
    }
}
