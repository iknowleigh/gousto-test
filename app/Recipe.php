<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{

	protected $fillable = ['box_type','title','slug','short_title','marketing_description','calories_kcal','protein_grams','fat_grams','carbs_grams','bulletpoint1','bulletpoint2','bulletpoint3','recipe_diet_type_id','season','base','protein_source','preparation_time_minutes','shelf_life_days','equipment_needed','origin_country','recipe_cuisine','in_your_box','gousto_reference'];

	public function ratings() {
        return $this->hasMany('App\Rating');
    }

	//We could add a lot more rules here but this is a simple example of what is possible
	private $RulesArr = [
		'add' => [
			'title' => 'required',
			'slug' => 'required|unique:recipes'
		],
		'edit' => [
			'title' => 'required'
		]
	];

	public function setRules($rule) {
        return $this->RulesArr[$rule];
    }
}