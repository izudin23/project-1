<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'company_id' => factory(\App\Company::class)->create(),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'phone' => $faker->phoneNumber,
    ];
});
