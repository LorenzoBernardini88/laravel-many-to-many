<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $newPost = new Post();
            $newPost -> title = $faker->words(3,true);
            $newPost -> content = $faker->text();
            $newPost -> published = rand(0,1);
            $newPost -> post_author = $faker->words(2,true);
            $newPost -> post_date = $faker->dateTime();
            $newPost -> slug = Str::of($newPost->title)->slug('-');

            $newPost->save();
            
        }
    }
}
