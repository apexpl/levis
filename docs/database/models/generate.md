
# Generate Models

Levis provides a CLI command that will go through the specified database table including all columns and foreign key constraints, then proceed to generate the model class itself plus any necessary model classes for foreign key constraints.

If you do not have any database tables created, you may create the following demo tables.  Save the below SQL code into the Levis installation directory within a file named `demo.sql`:

~~~sql
CREATE TABLE demo_categories (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    is_active BOOLEAN NOT NULL DEFAULT true,
    slug VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE demo_products (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT true,
    in_stock INT NOT NULL DEFAULT 0,
    price DECIMAL(8,2) NOT NULL DEFAULT 0,
    description TEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES demo_categories (id) ON DELETE CASCADE
);

CREATE TABLE demo_product_reviews (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES demo_products (id) ON DELETE CASCADE
);
~~~

NoExecute the SQL code by running the command:

> `./levis sql --file demo.sql`

That's it, and if needed the db.sqlite file will be created for the new SQLite database, and the database tables will be created.

## Generate Model Classes

You may generate the model classes for the tables created above by running the following command:

> `./levis create model Models/Product --dbtable demo_products`

The above command will ask you to confirm whether or not you wish to generate a model for the foreign key relationships found.  Select yes for both, and you will notice three new files located within the ~/src/Models/ directory.  If you have different database tables to create models for, then change the command above accordingly.

Some notes about the above command:

* First and only argument is location where yyou would like the new model class saved, relative to the /src/ directory.  The ".php" extension is optional.
* The `--dbtable` flag is required, and is the name of the database table to create the model for.
* If you wish to have standard getter / setter methods generated, simply add the `--nomagic` flag to the above command.


## Anatomy of Models

Open the newly generated model class, and you will notice they are rather small PHP classes.  A few notes regarding the model classes:

* The `$dbtable` property must be present, and set to the name of the database table the model represents.
* Constructor property promotion is used with one property for each column within the database table.  Column type, default values, and nullables have been taken into account when generating the properties.
* The foreign keys were taken into account, with the necessary methods generated in each model class to retrieve the parent / child objects.
* There are no getter / setter methods for each property, and instead you may get / set all properties directly at `$obj->property_name`.
* If you prefer standard getter / setter methods for each property, simply add the `--nomagic` flag when generating the model.


