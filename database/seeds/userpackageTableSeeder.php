<?php

use Illuminate\Database\Seeder;
use App\Model\Userpackage;

class userpackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Userpackage =[
        ['id'=>'1','user_id'=>1,'package_id'=>1],
        ['id'=>'2','user_id'=>2,'package_id'=>2],
        ['id'=>'3','user_id'=>3,'package_id'=>1],
        ['id'=>'4','user_id'=>1,'package_id'=>2]
           
        ];
        Userpackage::insert($Userpackage);
    }
}
