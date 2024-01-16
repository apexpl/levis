
# Retrieve Records

With model classes generated and records inserted, let's go through how to retrieve them from the database.  Open a blank file within the Levis installation directory, and enter the following contents:

~~~php
<?php

use Levis\App\App;
use App\Models\{Category, Product};

// Load Levis
require_once('./vendor/autoload.php');
$app = new App();

// Get category
$slug = 'service';
if (!$cat = Category::whereFirst('slug = %s', $slug)) { 
    die("No category with slug '$slug'");
}
echo "Found Category: " . $cat->name . "\n";

// Get same category, by id#
$category_id = $cat->id;
$cat = Category::whereId($category_id);

// Get all products within category, sorted by name
$products = $cat->getProducts('name');
foreach ($products as $product) { 
    echo "Product: " . $product->name . ' - ' . $product->price . "\n";
}

// Get all active products with price greater than $20
$is_active = true;
$price = 20;
$products = Product::where('is_active = %b AND price > %d', $is_active, $price);
foreach ($products as $product) { 
    echo "Product: " . $product->name . ' - ' . $product->price . "\n";
}

// Get all categories, sorted by name
$categories = Category::all('name');
foreach ($categories as $cat) { 
    print_r($cat->toArray());
}
~~~

Although a bit of a handful, execute the above code for an example of how to retrieve records.  The below sections go through everything in the above code in detail.


## Select Multiple Records

You may select multiple records using the static `where()` method, for example:

~~~php

use App\Models\Product;

// Get all active products with price greater than 24.95
$is_active = true;
$price = 24.95;
$products = Product::where('is_active = %b AND price > %d', $is_active, $price);
foreach ($products as $product) { 
    echo "Found Product: " . $product->name . ' - ' . $product->price . "\n";
}
~~~

The first argument is the where clause within the SQL statement, and all other arguments are the values of any placeholders.  For information on placeholders, please visit the [Database Placeholders](/docs/database/adl/placeholders) page of the documentation.  This will return an iterator of all model instances that match the criteria.

Within the first argument you may also add any desired order by, limit, offset, et al statements.  For example:

~~~php

use App\Models\Product;

$price = 24.95;
$products = Product::where('price > %d ORDER BY name LIMIT 25 OFFSET50', $price);
~~~


## Select First Record

Many times you will only need the first matching record, which can be done with the static `whereFirst()` method, for example:

~~~

use App\Models\Category;

$slug = 'service';
if (!$cat = Category::whereFirst('slug = %s', $slug)) { 
    die("No category found");
}

print_r($cat->toArray());
~~~

Same as the `where()` method, except instead of returning an iterator of all matching records, it will only return a model instance of the first record found.


## Select Record by ID

You may also select a record by its unique ID# with the static `whereId()` method, for example:

~~~php

use App\Models\Product;

$product_id = 51;
if (!$product = Product::whereId($product_id)) { 
    die("No product found");
}

print_r($product->toArray());
~~~

This will select the individual record based on the primary key column of the database table, and return an instance of the model class or null if no record is found.


## Select All Records

You may retrieve all records within the database table with the static `all()` method, for example:

~~~php

use App\Models\Category;

$limit = 10;
$offset = 20;

// Get categories 10 - 25 prdered by name is descending order
$cats = Category::all('name', 'desc', $limit, $offset);
foreach ($cats as $category) { 
    print_r($category->toArray());
}
~~~

The `all()` method accepts four optional parameters, the column to sort by, the direction to sort, plus a limit and offset.  For full details, please visit the [BaseModel::all()](/docs/classes/BaseModel/all) page of the documentation.



