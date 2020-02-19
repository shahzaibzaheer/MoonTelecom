<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

use App\Package;

class DatabaseSeeder extends Seeder
{


//    public function createNewUser(){
//        $faker = Faker::create();
//        DB::table('users')->insert([
//            [
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'email_verified_at' => now(),
//                'password' => bcrypt('password'),
//                'remember_token' => Str::random(10),
//            ]
//        ]);
//    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);

        // ********** Create admin
        DB::table('users')->insert([
            [
                'name'=>'chand',
                'email'=>'bilalchand44@gmail.com',
                'email_verified_at' => now(),
                'isAdmin'=>true,
                'password'=> bcrypt('Bil@l222'),
                'remember_token' => Str::random(10),
            ],
        ]);
        // ******************* Create users
//        for($i=0; $i<10; $i++){
//            $this->createNewUser();
//        }



//        //******* Create Packages
//        DB::table('packages')->insert([
//            [
//                'name'=>'1MB',
//                'bandwidth'=> 1000,
//                'fees'=> 1000,
//                'isCustom'=> false
//            ],
//            [
//                'name'=>'1200kb',
//                'bandwidth'=> 1200,
//                'fees'=> 1200,
//                'isCustom'=> false
//            ],
//            [
//                'name'=>'1500KB',
//                'bandwidth'=> 1500,
//                'fees'=> 1500,
//                'isCustom'=> false
//            ],
//            [
//                'name'=>'2MB',
//                'bandwidth'=> 2000,
//                'fees'=> 2000,
//                'isCustom'=> false
//            ],
//            [
//                'name'=>'3MB',
//                'bandwidth'=> 3000,
//                'fees'=> 3000,
//                'isCustom'=> false
//            ],
//            [
//                'name'=>'4MB',
//                'bandwidth'=> 4000,
//                'fees'=> 3500,
//                'isCustom'=> false
//            ]
//        ]);
//
//
//        //******* Create Villages
//        DB::table('villages')->insert([
//            [
//                'name'=> 'Bajwal'
//            ],
//            [
//                'name'=> 'Daska'
//            ],
//            [
//                'name'=> 'Allahbad'
//            ],
//            [
//                'name'=> 'Cheema Coloney'
//            ],
//            [
//                'name'=> 'Jinnah Coloney'
//            ],
//            [
//                'name'=> 'Lalamusa'
//            ]
//        ]);







    }
}
