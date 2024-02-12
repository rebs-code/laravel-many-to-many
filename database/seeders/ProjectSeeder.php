<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//import the Faker class
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        Project::truncate();

        for ($i = 0; $i < 10; $i++) {

            $type = Type::inRandomOrder()->first();

            $project = new Project();

            $project->name = $faker->sentence(3);
            $project->description = $faker->paragraph(3);
            $project->tech_stack = $faker->sentence(3);
            $project->repo_link = $faker->url;
            $project->live_link = $faker->url;
            $project->image = $faker->imageUrl();
            //use the Str class to slugify the name
            $project->slug = Str::of($project->name)->slug('-');
            $project->type_id = $type->id;

            $project->save();
        }
    }
}
