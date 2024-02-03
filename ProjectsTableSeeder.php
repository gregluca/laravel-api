<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $project = config('projects'); 
        for($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(15);
            $project->description = $faker->text(500);
            $project->slug = Str::slug($project->title);
            $project->save();
        }

    }
}
