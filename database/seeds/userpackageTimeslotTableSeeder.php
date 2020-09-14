<?php

use Illuminate\Database\Seeder;
use App\Model\Userpackage_timeslot;

class userpackageTimeslotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $Userpackage_timeslot =[
        ['id'=>'1','user_package_id'=>1,'slotDate'=>'10/09/2020','slotStart'=>'11:3:02','slotEnd'=>'12:03:0'],
        ];
        Userpackage_timeslot::insert($Userpackage_timeslot);
    }
}
