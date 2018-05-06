<?php

use App\UnsplashImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        UnsplashImage::flushEventListeners();
        (new UnsplashImage)->truncate();
        $imageQuentity = 200;
        factory(UnsplashImage::class, $imageQuentity)->create();
    }
}
