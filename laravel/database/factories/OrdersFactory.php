<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $status = \App\Models\OrderStatus::where('type', '=',config('order_status'))->first();
    return [
        'status_id' => $status->id,
        'user_id' =>function () {
            return factory(App\Models\User::class)->create()->id(rand());
        },
        'user_name' =>function () {
            return factory(App\Models\User::class)->create()->name(rand());
        },
        'user_surname' =>function () {
            return factory(App\Models\User::class)->create()->surname(rand());
        },
        'user_email' =>function () {
            return factory(App\Models\User::class)->create()->email(rand());
        },
        'user_phone' =>function () {
            return factory(App\Models\User::class)->create()->phone(rand());
        },
        'country' => $faker->country,
        'city' => $faker->city,
        'address' =>$faker->streetAddress,
        'total' => $faker->randomFloat(2,100,5000)

    ];
});
