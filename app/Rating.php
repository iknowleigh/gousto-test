<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $fillable = ['recipe_id','rating'];

    public function recipes() {
        return $this->belongsTo('App\Recipe', 'recipe_id', 'id');
    }

	private $RulesArr = [
		'add' => [
			'rating' => ['required', 'integer']
		]
	];

	public function setRules($rule) {
        return $this->RulesArr[$rule];
    }
}
