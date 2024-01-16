
# Accessing the Database

The database object is available via the `Levis\Svc\Db` class and generally always obtained via attribute or constructor injection, for example:

~~~php
namespace App\Controllers;

use Levis\Svc\Db;

/**
 * Products class
 */
class Products
{

    #[Inject(Db::class)]
    private Db $db;

    /**
     * Alternatively, via constructor injection
     */
    public function __construct(
        private Db $db
    ) { 

    /**
     * Execute some SQL statements
     */
    public function execute(): void
    {

        // GO through admins
        $rows = $this->db->query("SELECT uuid,full_name FROM admin" ORDER BY full_name);
        foreach ($rows as $row) {
            print_r($row);
        }

        // Insert
        $this->db->insert('my_table', [
            'name' => 'Mike Smith',
            'amount' => 33,15,
            'quantity' => 3
        ]);

    }

~~~



