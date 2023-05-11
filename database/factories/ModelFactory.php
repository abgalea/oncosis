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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'position' => $faker->randomElement(['Usuario', 'Doctor/a', 'Secretario/a', 'Enfermero/a']),
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Provider::class, function (Faker\Generator $faker) {
    $name = $faker->company;
    $short_name = str_replace([' ', '-', ','], ['', '', ''], substr(strtoupper($name), 0, 7));
    return [
        'short_name' => $short_name,
        'name' => $name,
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\InsuranceProvider::class, function (Faker\Generator $faker) {
    $provider_id = factory(App\Models\Provider::class, 1)->create()->id;
    return [
        'provider_id' => $provider_id,
        'name' => $faker->company,
        'percentage' => $faker->randomFloat(2, 1, 30),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Pathology::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Practice::class, function (Faker\Generator $faker) {
    $description = $faker->sentence(3);
    $short_code = substr(strtoupper(str_replace([' '], [''], $description)), 0, 5);
    return [
        'short_code' => $short_code,
        'description' => $description,
        'fee' => $faker->randomFloat(0, 1000, 20000),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Patient::class, function (Faker\Generator $faker) {
    // $insurance_provider_id = factory(App\Models\InsuranceProvider::class, 1)->create()->id;
    $insurance_provider_id = \App\Models\InsuranceProvider::orderByRaw('RAND()')->first()->id;
    return [
        'insurance_provider_id' => $insurance_provider_id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'id_number' => $faker->randomNumber(),
        'date_of_birth' => $faker->date('Y-m-d', '18 years ago'),
        'insurance_id' => $faker->randomNumber(),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'phone_number' => $faker->phoneNumber,
        'occupation' => $faker->sentence(2),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Treatment::class, function (Faker\Generator $faker) {
    $description = $faker->sentence(3);
    $short_code = substr(strtoupper(str_replace([' '], [''], $description)), 0, 5);
    return [
        'short_code' => $short_code,
        'description' => $description,
        'fee' => $faker->randomFloat(0, 1000, 20000),
        'is_active' => $faker->randomElement([1, 0])
    ];
});

$factory->define(App\Models\Metric::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(1),
        'is_active' => $faker->randomElement([1, 0])
    ];
});
