<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{

    private $movieData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $movieData[] = [
                'title' => Str::random(10),
                'description' => Str::random(10),
                'imdb' => Str::random(10),
                'image' => Str::random(10),
                'seen' => Str::random(10),
                'schedule' => Str::random(10),
                'user' => Str::random(10)
               
            ];
            foreach ($movieData as $movie) {
                User::create($movie);
            }
    }
}
}
