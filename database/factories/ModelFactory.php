<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeProject\Entities\User::class, function ($faker)
{
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeProject\Entities\Client::class, function ($faker)
{
    return [
        'name'        => $faker->name,
        'responsible' => $faker->name,
        'email'       => $faker->email,
        'phone'       => $faker->phoneNumber,
        'address'     => $faker->address,
        'obs'         => $faker->sentence,
    ];
});

$factory->define(CodeProject\Entities\Project::class, function ($faker)
{
    return [
        'owner_id'    => rand(1, 5),
        'client_id'   => rand(1, 10),
        'name'        => $faker->name,
        'description' => $faker->sentence,
        'progress'    => $faker->name,
        'status'      => $faker->name,
        'due_date'    => '2018-11-10',
    ];
});