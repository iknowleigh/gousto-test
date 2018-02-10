<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
			$table->dateTime('created_at')->nullable();
			$table->dateTime('updated_at')->nullable();
            $table->string('box_type')->nullable();
            $table->string('title')->nullable();
			$table->string('slug')->nullable();
			$table->string('short_title')->nullable();
			$table->string('marketing_description')->nullable();
			$table->integer('calories_kcal')->nullable();
			$table->integer('protein_grams')->nullable();
			$table->integer('fat_grams')->nullable();
			$table->integer('carbs_grams')->nullable();
			$table->string('bulletpoint1')->nullable();
			$table->string('bulletpoint2')->nullable();
			$table->string('bulletpoint3')->nullable();
			$table->integer('recipe_diet_type_id')->nullable();
			$table->string('season')->nullable();
			$table->string('base')->nullable();
			$table->string('protein_source')->nullable();
			$table->integer('preparation_time_minutes')->nullable();
			$table->integer('shelf_life_days')->nullable();
			$table->string('equipment_needed')->nullable();
			$table->string('origin_country')->nullable();
			$table->string('recipe_cuisine')->nullable();
			$table->string('in_your_box')->nullable();
			$table->integer('gousto_reference')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes');
    }
}
