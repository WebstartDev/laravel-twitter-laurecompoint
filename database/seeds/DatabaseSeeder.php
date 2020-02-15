<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Post_user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TweetsTableSeeder::class);
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i < 6; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->username = $faker->firstName;
            $user->avatar = $faker->image('public/img/',640,480, 'animals', false);
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('123456');
            $user->save();
        }

        for ($i = 1; $i < 6; $i++) {
            $post = new Post;
            $post->name = $faker->realText(140);
            $post->user_id = $i;
          
            $post->save();
        }
       
    }
}
