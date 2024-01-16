
# Prepared Statements

Placeholders may be used within all SQL statements with the values being passed as additional parameters to the methods.  For example:

~~~php
namespace App\MyProject;

use Levis\Svc\Db;

class Products
{

    #[Inject(Db::class)]
    private Db $db;

    /**
     * Do something
     */
    public function doSomething(string $uuid, int $category_id)
    {

        $rows = $this->db->query("SELECT * FROM products WHERE uuid = %s AND category_id = %i", $uuid, $category_id");
        foreach ($rows as $row) { 
            print_r($row);
        }

        // Get first row
        if (!$last_row = $this->db->getRow("SELECT * FROM orders WHERE uuid = %s ORDER BY created_at DESC LIMIT 1", $uuid)) { 
            throw new \Exception("No order found");
        }

    }

}
~~~




# Placeholders

There is full support for typed, sequential and named placeholders.  Please note, although it doesn't matter which one, you should only use one type and do not mix them.  Placeholders protect against SQL injection as the variables they are replaced with are properly sanitized and prepared.

## Typed Placeholders

These are prefixed with a % sign, and define the expected data type of the variable.  For example:

~~~php
$rows = $db->query("SELECT * FROM users WHERE status = %s AND group_id = %i", $status, $group_id);
~~~

The above will ensure that `$status` is a string, and `$group_id` is an integer before even sending it to the SQL engine to be prepared.  The following typed placeholders are supported:

Placeholder | Description
------------- |------------- 
%s | string
%b | Boolean (1 or 0 only)
%i | integer
%d | Decimal / float
%ls | Used within LIKE and NOT LIKE clauses, and is surrounded by % marks as wildcards during format.
%e | E-mail address
%url | URL
%ds | Date (YYYY-MM-DD)
%ts | Time (HH:II:SS)
%dt | Tempstamp (YYYY-MM-DD HH:II:SS)
%blob | Binary data


## Sequential Placeholders

These are simply numbers surrounded by curly braces, such as `{1}`, `{2}`, et al.  For example:

~~~php
$rows = $db->query("SELECT * FROM users WHERE status = {1} AND group_id = {2}", $status, $group_id);
~~~

This does not do any type checking, and the bind parameters sent to the SQL engine to prepare the statement will all be set to string.


## Named Placeholders

If you dislike sequential lists, named placeholders are also available which are any string you wish surrounded by curly braces, such as `{name}`, `{status}`, and so on.  For example:

~~~php
$vars = [
    'status' => 'active', 
    'group_id' => 4
];

$rows = $db->query("SELECT * FROM users WHERE status = {status] AND group_id = {group_id}", $vars);
~~~

Same as sequential placeholders, all placeholders will be treated as strings within the bind parameters.



