<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $status = \App\Models\OrderStatus::where('type', '=',config('order_status'))->first();
    $user = \App\Models\User::get()->random();
    return [
        'status_id' => $status->id,
        'user_id' =>$user->id,
        'user_name' => $user->name,
        'user_surname' =>$user->surname,
        'user_email' =>$user->email,
        'user_phone' =>$user->phone,
        'country' => $faker->country,
        'city' => $faker->city,
        'address' =>$faker->streetAddress,
        'total' => $faker->randomFloat(2,100,5000)

    ];
});
