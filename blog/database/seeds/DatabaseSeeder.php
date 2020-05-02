<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class , 30)->create()->each(function ($user) {
            factory(\App\Article::class , rand(0,10))
                ->create([ 'user_id' => $user->id])
                ->each(function($article) {
                    factory(\App\comment::class , rand(0,5))
                        ->create([
                            'article_id' => $article ,
                            'user_id' => \App\User::all()->random()->id
                        ]);
                });
        });
    }
}
