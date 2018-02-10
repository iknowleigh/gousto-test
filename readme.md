# Gousto Technical Test

A RESTful API used to manage Retrieving, Creating and Editing recipes and rating.
The test has been built with the Laravel framework. The reason for using Laravel is that this a modern MVC framework which features all the required functionality for rapid development of complex applications.  


### Installation

Either clone the repo or download the zip file.

Run <code>composer install</code> to install the dependencies

This test has been setup to use a sqlite database and this is populated from the supplied CSV. The CSV file can be found in public/files.  To clear the database and test the CSV import, run the following command: <code>php artisan migrate:refresh --seed</code>  

Run the server <code>php artisan serve</code>

### Routes

The API can be accessed using the below urls, I would recommend using Postman to test this however feel free to use a HTTP client of your choice.

<h2>Get all Recipes</h2>
<pre><code>GET - http://127.0.0.1:8000/api/recipes</code></pre>

<h2>Filter Recipes by cuisine</h2>
<pre><code>GET - http://127.0.0.1:8000/api/recipes/{filter}</code></pre>
<pre><code>Example - http://127.0.0.1:8000/api/recipes/british</code></pre>

<h2>Add a new Recipe</h2>
<pre><code>POST - http://127.0.0.1:8000/api/recipe/add</code></pre>

The payload should contain the following:
<pre><code>
{
  "box_type": "gourmet",
  "title": "banners and mash",
  "slug": "banners-and-mash",
  "short_title": "banners and mash",
  "marketing_description": "banners and mash, mmm tasty",
  "calories_kcal": "100",
  "protein_grams": "12",
  "fat_grams": "12",
  "carbs_grams": "1",
  "bulletpoint1": "...",
  "bulletpoint2": "...",
  "bulletpoint3": "...",
  "recipe_diet_type_id": "meat",
  "season": "all",
  "base": "potato",
  "protein_source": "pork",
  "preparation_time_minutes": "30",
  "shelf_life_days": "2",
  "equipment_needed": "Appetite",
  "origin_country": "Great Britain",
  "recipe_cuisine" : "british",
  "in_your_box": "food",
  "gousto_reference": "22"
}
</code></pre>

<h2>Edit an existing Recipe</h2>
<pre><code>PATCH - http://127.0.0.1:8000/api/recipe/edit/{id}</code></pre>
<pre><code>Example - http://127.0.0.1:8000/api/recipe/edit/1</code></pre>

The payload should contain the following:
<pre><code>
{
  "box_type": "gourmet",
  "title": "banners and mash v2",
  "slug": "banners-and-mash",
  "short_title": "banners and mash",
  "marketing_description": "banners and mash, mmm tasty",
  "calories_kcal": "100",
  "protein_grams": "12",
  "fat_grams": "12",
  "carbs_grams": "1",
  "bulletpoint1": "...",
  "bulletpoint2": "...",
  "bulletpoint3": "...",
  "recipe_diet_type_id": "meat",
  "season": "all",
  "base": "potato",
  "protein_source": "pork",
  "preparation_time_minutes": "30",
  "shelf_life_days": "2",
  "equipment_needed": "Appetite",
  "origin_country": "Great Britain",
  "recipe_cuisine" : "british",
  "in_your_box": "food",
  "gousto_reference": "22"
}
</pre></code>

<h2>Add Recipe Rating</h2>
<pre><code>PATCH - http://127.0.0.1:8000/api/rating/add/{reipe_id}</code></pre>
<pre><code>Example - http://127.0.0.1:8000/api/rating/add/1</code></pre>

The payload should contain the following:
<pre><code>
{
	"rating":"5"
}
</pre></code>

### Using with different API consumers
The way this API has been constructed means it can be used with an array of different clients easily.

This API could be consumed on a server using Node, PHP or .NET for example to serve the content on a webpage.  
This could also be used on a mobile device using any of the common HTTP clients for example Fetch, JQuery or Axios.  

### Test cases
I have written a few basic test cases which can be run using the following command:
<pre><code>./vendor/bin/phpunit</pre></code>
