<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = ['фильмы', 'сериалы', 'мультфильмы'];
        $genres = ['боевик', 'фантастика', 'романтика', 'приключения'];
        $countries = ['США', 'Великобритания', 'Турция', 'Россия'];
        $years = ['2019', '2020', '2021', '2022'];
        $participants = [
            ['Брэд Питт', 'Brad-pitt.jpg'],
            ['Николас Кэйдж', 'Cage.jpeg'],
            ['Роберт Дауни младший', 'Dauni.jpg'],
            ['Джонни Депп', 'Depp.jpg'],
            ['Леонардо ди Каприо', 'Dicaprio.jpg'],
            ['Сильвестр Сталлоне', 'Stallone.jpg'],
            ['Джейсон Стэтхэм', 'Stethem.jpg'],
            ['Марк Уолберг', 'Uolberg.jpg'],
        ];
        foreach ($participants as  $value) {
            
                DB::table('participants')->insert([
                    'name' => $value[0],
                    'image' => $value[1]
                ]);
            
        }
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'title' => $category,
            ]);
        }
        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'title' => $country,
            ]);
        }
        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'title' => $genre,
            ]);
        }
        foreach ($years as $year) {
            DB::table('years')->insert([
                'title' => $year,
            ]);
        }
    }
}
