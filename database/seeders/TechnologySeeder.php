<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'Javascript', 'Vue', 'Laravel', 'Bootstrap', 'Tailwind', 'React', 'Angular', 'Node', 'MySQL', 'Vite'];

        foreach ($technologies as $technology) {

            $new_technology = new Technology();

            $new_technology->name = $technology;
            //use the Str class to slugify the name
            $new_technology->slug = Str::of($technology)->slug('-');

            $new_technology->save();
        }
    }
}
