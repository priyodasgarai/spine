<?php

use Illuminate\Database\Seeder;
use App\Model\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packageRecords =[
        ['id'=>'1','name'=>'package a','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
            'package_image'=>'','amount'=>34,'status'=>1 ],
        ['id'=>'2','name'=>'package b','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
            'package_image'=>'','amount'=>37,'status'=>1 ],   
        ];
        Package::insert($packageRecords);
    }
}
