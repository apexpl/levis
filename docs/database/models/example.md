
# Example Model

Below shows a quick example of a model:

~~~php
<?php

namespace App\Models;

use Levis\App\Model\MagicModel;
use Levis\App\Model\ModelIterator;
use App\Models\{Category, Review};
use DateTime;

/**
 * Products
 */
class Product extends MagicModel
{

    /**
     * Database table
     */
    protected static string $dbtable = 'products';

    /**
     * Constructor
     */
    public function __construct(
        private int $Id,
        private int $category_id,
        private string $name,
        private int $parent_id = 0,
        private ?DateTIme $updated_at = null,
        private DateTime $created_at = new DateTime()
    ) {
    }

    /**
     * Get category
     */
    public function getCategory(): ?Category
    {
        $obj = Category::whereId($this->category_id);
        return $obj;
    }

    /**
     * Get reviews
     */

    public function getReviews(string $sort_by = '', string $sort_dir = '', int $limit = 0, int $offset = 0):ModelIterator
    {
        $result = $this->getChildren('product_reviews.product_id', Review::class, $sort_by, $sort_dir, $limit, $offset);
        return $result;
    }

}
~~~

A few points about the above model class:

* The static `$dbtable` property is required, and defines the database table assigned to the model class.
* All properties within the constructor reflect the column names within the database table, including data type, default value, nullable, et al.
* Auto-generation of model classes will notice the foreign key constraints, and generate the `getCategory()` and `getReviews()` methods for many-to-one and one-to-many relationships.


#### MagicModel vs. BaseModel

All models contain the functionality and methods of the BaseModel class.  MagicModel is an optional layer on top of BaseModel which allows you to rid the class of all boilerplate getter / setter methods, and instead get / set properties directly via the magic __get() and __set() methods.

The above model class is a MagicModel, meaning you may get and set properties with, for example:

~~~php

$obj = Product::whereId(5);

// Get name
echo "Name: " . $obj->name . "\n";

// Set and save category id
$obj->category_id = 6;
$obj->save();
~~~




