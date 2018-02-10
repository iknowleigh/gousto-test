<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$file = public_path('files/recipe-data.csv');

        if (($handle = fopen ( $file, 'r' )) !== FALSE) {
			$i = 0;
			while ( ($row = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
				if ($i !== 0) {
					\DB::table('recipes')->insert(array(
						'id' => $row[0],
						'created_at' => \DateTime::createFromFormat('d/m/Y H:i:s', $row[1])->format('Y-m-d H:i:s'),
						'updated_at' => \DateTime::createFromFormat('d/m/Y H:i:s', $row[2])->format('Y-m-d H:i:s'),
						'box_type' => $row[3],
						'title' => $row[4],
						'slug' => $row[5],
						'short_title' => $row[6],
						'marketing_description' => $row[7],
						'calories_kcal' => $row[8],
						'protein_grams' => $row[9],
						'fat_grams' => $row[10],
						'carbs_grams' => $row[11],
						'bulletpoint1' => $row[12],
						'bulletpoint2' => $row[13],
						'bulletpoint3' => $row[14],
						'recipe_diet_type_id' => $row[15],
						'season' => $row[16],
						'base' => $row[17],
						'protein_source' => $row[18],
						'preparation_time_minutes' => $row[19],
						'shelf_life_days' => $row[20],
						'equipment_needed' => $row[21],
						'origin_country' => $row[22],
						'recipe_cuisine' => $row[23],
						'in_your_box' => $row[24],
						'gousto_reference' => $row[25],
					));
				}
				++$i;
			}
			fclose ( $handle );

		}
	}
}


