<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class AddPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        factory(Post::class, 10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
