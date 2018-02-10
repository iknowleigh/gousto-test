<?php

namespace App\Repositories;

use App\Rating;
use App\Recipe;

class RatingRepository {

	protected $rating;

	public function __construct(Rating $rating) {
	    $this->rating = $rating;
	}

	public function getRules($rule) {
		return $this->rating->setRules($rule);
	}

	public function save($data, $recipeID) {
		$recipe = new Recipe();
		$recipeData = $recipe->find($recipeID);

		if ($recipeData) {
			$rating = new $this->rating;

			//ensure we enforce foreign key constraint
			$rating->recipes()->associate($recipeData);
			$rating->fill($data);

			if ($rating->save()) {
				return ['response' => 'success', 'message' => 'Save successful'];
			} else {
				return ['response' => 'failure', 'message' => 'Unable to save data'];
			}
		} else {
			return ['response' => 'failure', 'message' => 'Recipe does not exist'];
		}
	}

}
