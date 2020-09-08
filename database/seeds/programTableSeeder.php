<?php

use Illuminate\Database\Seeder;
use App\Model\Program;
class programTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Program =[
        ['id'=>'1','name'=>'package 1','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
            'status'=>1 ],
        ['id'=>'2','name'=>'package 2','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
           'status'=>1 ], 
            ['id'=>'3','name'=>'package 3','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
            'status'=>1 ],
        ['id'=>'4','name'=>'package 4','description'=>'Documentation for the TextInfo template.information about this edition. 
In publishing and graphic design, lorem ipsum (or simply lipsum) is standard placeholder text used to demonstrate the graphic elements of a document or visual',
           'status'=>1 ], 
        ];
        Program::insert($Program);
    }
}
