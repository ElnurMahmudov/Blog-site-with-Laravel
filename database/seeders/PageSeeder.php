<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages=['Haqqımızda','Kariyera','Missiya','Əlaqə'];
        $count=0;
        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>$page,
                'image'=>'https://img.freepik.com/free-photo/smiley-businesswoman-posing-outdoors-with-arms-crossed-copy-space_23-2148767055.jpg',
                'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Repudiandae, sint in quae at nam autem consectetur ratione 
                            ad quisquam provident distinctio, blanditiis soluta quibusdam 
                            est adipisci similique. Nesciunt, pariatur non?',
                'order'=>$count,
                'Created_at'=>now(),
                'Updated_at'=>now()
            ]);
        }
    }
}
