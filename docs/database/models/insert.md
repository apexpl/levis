
# Insert Records

Now that you've generated some model classes, let's add some records to them using the static `insert()` method.  Open a blank file within the Levis installation directory, and enter the following contents:
~~~php
<?php

use Levis\App\App;
use App\Models\{Category, Product};

// Load Levis
require_once('./vendor/autoload.php');
$app = new App();

// Create category
$cat = Category::insert([
    'slug' => 'services',
    'name' => 'Services'
]);

// Display category info
print_r($cat->toArray());

// Add product
$product = Product::insert([
    'category_id' => $cat->id,
    'price' => 34.95,
    'name' => 'House Cleaning Service',
    'description' => 'Make your house shine!'
]);

// View product
print_r($product->toArray());
~~~

Run the script, and the two arrays of the new objects will be displayed.  The `ModelName::insert()` method accepts a single associative array defining the values of the new record to create, and returns an instance of the newly created record.  You may view the reference  page of this method by visiting the [BaseModel::insert()](../../classes/app/model/basemodel/insert.md) page.


## Insert Multiple Records

You may also insert multiple records at once by passing an array of associative arrays to the static `insert()` method, for example:

~~~php

use App\Models\Category;

Category::insert([
    ['slug' => 'furniture', 'name' => 'Furniture'],
    ['slug' => 'electronics', 'name' => 'Electronics'],
    ['slug' => 'kitchen', 'name' => 'Kitchenware']
]);
~~~


## Insert or Update

If you are uncertain whether or not a record needs to be inserted or updated, you may use the static `insertOrUpdate()` method, for example:

~~~php

use App\Models\Category;

Category::insertOrUpdate(
    ['slug' => 'services'],
    ['name' => 'Services']
);

Category::insertOrUpdate(
    ['slug' => 'services'],
    ['name' => 'Personal Services']
);
~~~

The above code will result in one category with the slug of "services" and name of "Personal Services".  This method takes two associative arrays, the first being the criteria to search for and the second being the values to update the record with.  If a record exists that matches the criteria, it will be updated with the values within the second array.  Otherwise, a new record will be created using the values of both arrays combined.




