<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeSlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_slides')->insert(
            [
                'title' => 'Où passer sa retraite en France ? Notre classement exclusif des villes où bien vieillir',
                'short_title' => 'Le Parisien dresse le palmarès inédit des villes où il fait bon vivre pour les retraités. Au programme : une trentaine de critères...',
                'home_slide' => 'upload/frontend/1744664591099656.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=U6ACAUmbGCE'
            ]
        );


    }
}
