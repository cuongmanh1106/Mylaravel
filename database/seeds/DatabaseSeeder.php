<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SPhamTableSeeder::class);
    }
}
class SPTableSeeder extends Seeder
{
	public function run()
	    {
	        DB::table('loaisp')->insert([
	        	array('hoten'=>'manh Cuong','sdt'=>'01688868553','email'=>'cuongmanh1106@gmaiil.com'),
	        	array('hoten'=>'manh huy','sdt'=>'0161238553','email'=>'huycuong@gmaiil.com')
	        	]);
	    }
}
class SPhamTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('san_pham')->insert([
            array('ten_mon_hoc'=>'Quan da banh','gia'=>'50000','ghichu'=>'nice','loai_sp'=>'1'),
            array('ten_mon_hoc'=>'Quan bong ro','gia'=>'150000','ghichu'=>'comfortable','loai_sp'=>'2'),
            array('ten_mon_hoc'=>'Quan boxing','gia'=>'70000','ghichu'=>'no comment','loai_sp'=>'1')

            ]);
    }
}
