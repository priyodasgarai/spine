<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userRecords =[
        ['id'=>'1','name'=>'priyo','email'=>'priyo@gmail.com','password'=>'$2y$10$yo56P0Cfiba13.J2DxfqOuWLE9o46GH0.prpPkaXfPvzEPGC1k6uC','image'=>'','status'=>1 ],
        ['id'=>'2','name'=>'ashis','email'=>'ashis@gmail.com','password'=>'$2y$10$yo56P0Cfiba13.J2DxfqOuWLE9o46GH0.prpPkaXfPvzEPGC1k6uC','image'=>'','status'=>1 ],   
        ];
        User::insert($userRecords);
    }
}
