
# Update and Delete Records

Upon retrieving an individual record from the database as an instance of the model class, let's see how to update and delete it.

~~~php
<?php

use App\Models\Product;

// Get product
$id = 1;
if (!$product = Product::whereId($id)) {
    die("No product exists with id# $id");
}

// Update properties directly, and save
$product->price = 89.95;
$product->save();

// Update by passing array to save()
$product->save([
    'name' => 'Update Test of Product',
    'price' => 49.95
]);

// Delete product
$product->delete(;
~~~


## Update Multiple Records

You may update multiple records at the same time by using the [update()](/docs/classes/app/base/model/basemodel/update) static method, for example:

~~~php
use App\Models\Product;

// Deactivate all produts with price less than 19.95
Product::update(
    ['is_active' => false], 
    "is_active = %b AND price < %d",
    true, 19.95
]);
~~~

The first argument is an associate array of the columns to update, second argument is the where clause of the SQL statement, and all other arguments are values of any placeholders within the where clause.

## Delete Multiple Records

Much the same as updating multiple records, you may delete multiple records by using the [deleteMany()](/docs/classes/app/base/model/basemodel/deletemany) static method, for example:

~~~php
use App\Models\Product;

// Delete all inactive products
Product::deleteMany('is_active = %b', false);
~~~




