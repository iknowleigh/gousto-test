<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Rating;

class RatingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	public function setUp() {
		 parent::setUp();
    }

/**
* Test for submitting a rating
*
* @return void
*/
	public function testCreateRating() {

		$ratingData = factory(Rating::class)->create();

		$this->assertDatabaseHas('ratings', ['id' => $ratingData->id]);
    }
}
