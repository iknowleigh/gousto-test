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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
    return
	[
		'box_type' => $faker->word,
		'title' => $faker->word,
		'slug' => $faker->word,
		'short_title' => $faker->word,
		'marketing_description' => $faker->word,
		'calories_kcal' => mt_rand(1, 999),
		'protein_grams' => mt_rand(1, 999),
		'fat_grams' => mt_rand(1, 10),
		'carbs_grams' => mt_rand(1, 9),
		'bulletpoint1' => $faker->word,
		'bulletpoint2' => $faker->word,
		'bulletpoint3' => $faker->word,
		'recipe_diet_type_id' => $faker->word,
		'season' => $faker->word,
		'base'  => $faker->word,
		'protein_source' => $faker->word,
		'preparation_time_minutes' => mt_rand(1, 99),
		'shelf_life_days' => mt_rand(1, 9),
		'equipment_needed' => $faker->word,
		'origin_country' => $faker->word,
		'recipe_cuisine' => $faker->word,
		'in_your_box' => $faker->sentence,
		'gousto_reference' => mt_rand(1, 99)
    ];
});

$factory->define(App\Rating::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => factory(App\Recipe::class)->create()->id,
        'rating' => mt_rand(1, 5)

    ];
});