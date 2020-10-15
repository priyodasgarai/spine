<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //  $this->call(UserTableSeeder::class);
       // $this->call(AdminTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);
         //$this->call(CategoryTableSeeder::class);
        //  $this->call(MasterproductTableSeeder::class);
         //  $this->call(PackageTableSeeder::class);
         
         // $this->call(programTableSeeder::class);
       //   $this->call(packageprogramTableSeeder::class);
       // $this->call(userpackageTableSeeder::class);
       // $this->call(userpackageTimeslotTableSeeder::class);
        $this->call(libraryTableSeeder::class);
        
    }
}
