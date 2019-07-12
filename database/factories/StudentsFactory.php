<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Students;
use Faker\Generator as Faker;

$factory->define(Students::class, function (Faker $faker) {
    return [
        'first_name' =>$faker->name,
        'last_name'=>$faker->name,
        'gender'=>'M',
        'class_id'=>'1'
    ];
});
