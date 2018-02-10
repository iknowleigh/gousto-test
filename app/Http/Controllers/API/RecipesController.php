<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RecipeRepository;

class RecipesController extends Controller {
	protected $recipe = null;

    public function __construct(RecipeRepository $recipe) {
		$this->recipe = $recipe;
	}

/**
* GET /recipe
* @param request $request
* @return JsonResponse
*/
	public function index(Request $request) {
		$filter = $request->route('filter');
		$recipes = $this->recipe->findAllFilter($filter);
		return response()->json($recipes);
	}

/**
* GET /recipe
* @param id $id
* @return JsonResponse
*/
	public function recipe($id) {
		$recipe = $this->recipe->find($id);
		return response()->json($recipe);
	}

/**
 * POST /recipes/add
 * @param Request $request
 * @return JsonResponse
 */
	public function add(Request $request) {

        if ($request->isMethod('post')) {

			$data = $request->json()->all();

			$validator = \Validator::make($data, $this->recipe->getRules('add'));

			if ($validator->fails()) {
			   return response()->json(['response' => 'failure', 'message' => $validator->errors()], 422);
			}

			if($this->recipe->updateOrCreate($data)) {
				return response()->json(['response' => 'success', 'message' => 'Save successful'], 200);
			} else {
				return response()->json(['response' => 'failure', 'message' => 'Unable to save data'], 422);
			}

        }

    }

/**
 * PATCH /recipes/edit/{id}
 * @param Request $request
 * @param $id
 * @return JsonResponse
 */
	public function edit(Request $request, $id) {

        if ($request->isMethod('patch')) {

			$data = $request->json()->all();

			$validator = \Validator::make($request->json()->all(), $this->recipe->getRules('edit'));

			if ($validator->fails()) {
			   return response()->json(['response' => 'failure', 'message' => $validator->errors()], 422);
			}

			if($this->recipe->updateOrCreate($data, $id)) {
				return response()->json(['response' => 'success', 'message' => 'Save successful'], 200);
			} else {
				return response()->json(['response' => 'failure', 'message' => 'Unable to save data'], 422);
			}

        }

    }

}
