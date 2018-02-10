<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RatingRepository;



use App\Rating;
use App\Recipe as Recipe;

class RatingsController extends Controller {

	protected $rating = null;

    public function __construct(RatingRepository $rating) {
		$this->rating = $rating;
	}

/**
 * POST /rating/add
 * @param Request $request
 * @param $recipeID
 * @return JsonResponse
 */
	public function add(Request $request, $recipeID) {

        if ($request->isMethod('post')) {

			$data = $request->json()->all();

			$validator = \Validator::make($data, $this->rating->getRules('add'));

			if ($validator->fails()) {
			   return response()->json($validator->errors(), 422);
			}

			$saveRating = $this->rating->save($data, $recipeID);

			if($saveRating['response'] === 'success') {
				return response()->json(['response' => 'success', 'message' => $saveRating['message']], 200);
			} else {
				return response()->json(['response' => 'failure', 'message' => $saveRating['message']], 422);
			}

        }

    }

}
