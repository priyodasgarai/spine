<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->delete();
        $adminRecords = [
            ['name'=>'admin', 'type'=>'admin', 'mobile'=>'7031552020', 'email'=>'admin@admin.com', 
                 'password'=>'$2y$10$L7xEFZzwRDJyirtwnkScy.JTySjt5Pis1OZ1keCqjBXtKQ0aeSl16', 'image'=>'', 'status'=>1,],
             ['name'=>'mrinal', 'type'=>'admin', 'mobile'=>'7031552020', 'email'=>'mrinal@admin.com', 
                 'password'=>'$2y$10$L7xEFZzwRDJyirtwnkScy.JTySjt5Pis1OZ1keCqjBXtKQ0aeSl16', 'image'=>'', 'status'=>1,],
             ['name'=>'ashis', 'type'=>'subadmin', 'mobile'=>'7031552020', 'email'=>'thiru301197@gmail.com', 
                 'password'=>'$2y$10$L7xEFZzwRDJyirtwnkScy.JTySjt5Pis1OZ1keCqjBXtKQ0aeSl16', 'image'=>'', 'status'=>1,],
             ['name'=>'habul', 'type'=>'admin', 'mobile'=>'7031552020', 'email'=>'habul@admin.com', 
                 'password'=>'$2y$10$L7xEFZzwRDJyirtwnkScy.JTySjt5Pis1OZ1keCqjBXtKQ0aeSl16', 'image'=>'', 'status'=>1,],
        ];
         DB::table('admin')->insert($adminRecords);
//        foreach ($adminRecords as $key =>$record){
//            \App\Model\admin::created($record);
//        }
    }
}
