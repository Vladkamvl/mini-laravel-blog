<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        for($i = 1; $i<=10; $i++){
            $catName = 'Категория №' . $i;

            $categories[] = [
                'title' => $catName,
                'slug' => \Illuminate\Support\Str::slug($catName),
                'description' => 'Описание у категории номер ' . $i
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
