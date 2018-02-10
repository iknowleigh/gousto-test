<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Recipe;


class RecipeTest extends TestCase
{

	public function setUp() {
		 parent::setUp();
    }

/**
* Test for getting the selected recipe
* @return void
*/
	public function testGetRecipe() {
        $response = $this->json('GET', '/api/recipe/1');

        $response
            ->assertStatus(200)
			->assertJson([
                'id' => true,
            ]);
    }

/**
* Test for getting list of all recipes
*
* @return void
*/
	public function testRecipeIndexAll() {
        $response = $this->json('GET', '/api/recipes');

        $response
            ->assertStatus(200)
			->assertJson([
                'data' => true,
            ]);
    }

/**
* Test for getting list filter by cuisine
*
* @return void
*/
	public function testRecipeIndexFilter() {
        $response = $this->json('GET', '/api/recipes/british');

        $response
            ->assertStatus(200)
			->assertJson([
                'data' => true,
            ]);
    }

/**
* Test for creating a new recipe
*
* @return void
*/
	public function testCreateRecipe() {
		$recipeData = factory(Recipe::class)->create();
		$this->assertDatabaseHas('recipes', ['title' => $recipeData->title]);
    }
}
