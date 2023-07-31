<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names=['Başlıq 1','Başlıq 2','Başlıq 3','Başlıq 4'];
        foreach($names as $name){
            DB::table('articles')->insert([
                'category_id'=>rand(1,7),
                'title'=>$name,
                'image'=>$name,
                'slug'=>$name,
                'content'=>$name,
                'Created_at'=>now(),
                'Updated_at'=>now()
            ]);
        }
    }
}
