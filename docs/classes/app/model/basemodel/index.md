
# Levis\App\Model\BaseModel

> Create, manage and retrieve records from the assigned model class that implements this class.

* public  static[all](all.md)([ string &#36;sort_by = 'id' ], [ string &#36;sort_dir = 'asc' ], [ int &#36;limit = '0' ], [ int &#36;offset = '0' ]): ModelIterator.md
* public  static[count](count.md)([ string &#36;where_sql = '' ], [ ... &#36;args ]): int.md
* public [delete](delete.md)(): void.md
* public  static[deleteMany](deletemany.md)(string &#36;where_sql, [ ... &#36;args ]): int.md
* public [getChildren](getchildren.md)(string &#36;foreign_key, string &#36;class_name, [ string &#36;sort_by = 'id' ], [ string &#36;sort_dir = 'asc' ], [ int &#36;limit = '0' ], [ int &#36;offset = '0' ]): ModelIterator.md
* public  static[insert](insert.md)(object | array &#36;values): ?static.md
* public  static[insertFromForm](insertfromform.md)(): static.md
* public  static[insertOrUpdate](insertorupdate.md)(array &#36;criteria, array &#36;values): ?static.md
* public  static[purge](purge.md)(): void.md
* public [save](save.md)([ array &#36;values = [] ]): void.md
* public [toArray](toarray.md)(): array.md
* public [toFormattedArray](toformattedarray.md)(): array.md
* public  static[update](update.md)(array &#36;values, [ string &#36;where_sql = '' ], [ ... &#36;args ]): void.md
* public  static[where](where.md)(string &#36;where_sql, [ ... &#36;args ]): ModelIterator.md
* public  static[whereFirst](wherefirst.md)(string &#36;where_sql, [ ... &#36;args ]): ?static.md
* public  static[whereId](whereid.md)(string | int &#36;id): ?static.md


