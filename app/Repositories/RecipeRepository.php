<?php

namespace App\Repositories;

use App\Recipe;

class RecipeRepository {

	protected $recipe;

	protected $pagination = 2;

	public function __construct(Recipe $recipe) {
	    $this->recipe = $recipe;
	}

	public function find($id) {
		return $this->recipe->findOrFail($id);
	}

	public function findAllFilter($filter) {
		return $recipes = $this->recipe->select('*')
			->when($filter, function ($query) use ($filter) {
				return $query->where('recipe_cuisine', '=', $filter);
			})
			->paginate($this->pagination);
	}

	public function getRules($rule) {
		return $this->recipe->setRules($rule);
	}

	public function updateOrCreate($data, $id = null) {

		return $saveRecipe = $this->recipe->updateOrCreate(
			['id' => $id],
			$data
		);
	}
}
