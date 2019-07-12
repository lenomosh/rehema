<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ClassTeachers;
use Faker\Generator as Faker;

$factory->define(ClassTeachers::class, function (Faker $faker) {
    return [
        'first_name'=>$faker->name,
        'last_name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'password'=>$faker->password
    ];
});
