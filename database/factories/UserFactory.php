<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->defineAs(User::class,'admin', function(){
    // return [
    //     'name'=>'moon',
    //     'email'=>'shahzaib.mughal02013@gmail.com',
    //     'email_verified_at' => now(),
    //     'isAdmin'=>true,
    //     'password'=> bcrypt('Pakistan143143143'),
    //     'remember_token' => Str::random(10),
    // ];
    return [
        'name'=>'moon',
        'email'=>'moon@gmail.com',
        'email_verified_at' => now(),
        'isAdmin'=>true,
        'password'=> bcrypt('admin'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
