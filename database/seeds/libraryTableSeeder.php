<?php

use Illuminate\Database\Seeder;
use App\Model\Library;

class libraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Library = [
            ['id'=>'1', 'name'=>'Libraryone', 'description'=>'Checking the network cables, modem, and router', 'duration'=>'34', 'library_code'=>'L01', 'library_video'=>'', 'library_image'=>'', 'price'=>56, 'status'=>1],
            ['id'=>'2', 'name'=>'Librarytwo', 'description'=>'Checking the network cables, modem, and router', 'duration'=>'67', 'library_code'=>'L02', 'library_video'=>'', 'library_image'=>'', 'price'=>89, 'status'=>1],
            ['id'=>'3', 'name'=>'Librarythree', 'description'=>'Checking the network cables, modem, and router', 'duration'=>'6', 'library_code'=>'L03', 'library_video'=>'', 'library_image'=>'', 'price'=>95, 'status'=>0],
            ['id'=>'4', 'name'=>'Libraryfour', 'description'=>'Checking the network cables, modem, and router', 'duration'=>'8', 'library_code'=>'L04', 'library_video'=>'', 'library_image'=>'', 'price'=>23, 'status'=>0]
        ];
        Library::insert($Library);
    }
}
