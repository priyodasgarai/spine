<?php

use Illuminate\Database\Seeder;
use App\Model\Packageprogram;
class packageprogramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Packageprogram =[
        ['id'=>'1','package_id'=>1,'program_id'=>3 ],
        ['id'=>'2','package_id'=>1,'program_id'=>2 ],
            ['id'=>'3','package_id'=>2,'program_id'=>1 ],
        ['id'=>'4','package_id'=>2,'program_id'=>2 ],
            ['id'=>'5','package_id'=>2,'program_id'=>3 ],
        ['id'=>'6','package_id'=>2,'program_id'=>1 ],
        ];
        Packageprogram::insert($Packageprogram);
    }
}
