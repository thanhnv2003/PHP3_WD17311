<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ProductSeeder::class, TestSeeder::class, UserSeeder::class]);
        // \App\Models\User::factory(10)->create();
        //đây là nơi tạo dữ liệu mẫu
//        $student = [
//          'name' => 'Nguyễn Văn Thành',
//          'email' => 'abc@gmail.com',
//          'address' => 'Phòng 401 Tòa L CS Trịnh Văn Bô',
//          'date_of_birth' => '2003-08-11',
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ];
//        $value = [];
//        for ($i = 1; $i < 50; $i++) {
//            array_push($value, $student);
//        }
//        DB::table('tests')->insert($value);


    }
}
