<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Database;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['Ümumi','Əyləncə','Səyahət','Siyasət','Texnologiya','İdman','Günlük yaşam'];
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>$category,
                'Created_at'=>now(),
                'Updated_at'=>now()
            ]);
        }
    }
}
