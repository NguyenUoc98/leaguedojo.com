<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        factory(App\Models\Slide::class, 5)->create();
        Schema::enableForeignKeyConstraints();
    }
}
