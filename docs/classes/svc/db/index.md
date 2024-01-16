
# Apex\Db\Interfaces\DbInterface

> Database interface

* public [addTime](addtime.md)(string &#36;period, int &#36;length, string &#36;from_date, [ bool &#36;return_datestamp = true ]): string.md
* public [beginTransaction](begintransaction.md)([ bool &#36;force_write = false ]): void.md
* public [checkTable](checktable.md)(string &#36;table_name): bool.md
* public [clearCache](clearcache.md)():.md
* public [closeCursors](closecursors.md)(): void.md
* public [commit](commit.md)(): void.md
* public [delete](delete.md)(string &#36;table_name, object | string &#36;where_clause, [ ... &#36;args ]): void.md
* public [dropAllTables](dropalltables.md)(): void.md
* public [dropTable](droptable.md)(string &#36;table_name): void.md
* public [eval](eval.md)(string &#36;sql): ?mixed.md
* public [executeSqlFile](executesqlfile.md)(string &#36;filename): void.md
* public [fetchArray](fetcharray.md)(PDOStatement &#36;stmt, [ ?int &#36;position = null ]): ?array.md
* public [fetchAssoc](fetchassoc.md)(PDOStatement &#36;stmt, [ ?int &#36;position = null ]): ?array.md
* public [fetchObject](fetchobject.md)(PDOStatement &#36;stmt, string &#36;class_name, [ ?int &#36;position = null ]): ?object.md
* public [forceWrite](forcewrite.md)([ bool &#36;always = false ]): void.md
* public [getColumn](getcolumn.md)(string &#36;sql, [ ... &#36;args ]): array.md
* public [getColumnDetails](getcolumndetails.md)(string &#36;table_name): array.md
* public [getColumnNames](getcolumnnames.md)(string &#36;table_name, [ bool &#36;include_types = false ]): array.md
* public [getDatabaseSize](getdatabasesize.md)(): float.md
* public [getField](getfield.md)(string &#36;sql, [ ... &#36;args ]): ?mixed.md
* public [getForeignKeys](getforeignkeys.md)(string &#36;table_name): array.md
* public [getHash](gethash.md)(string &#36;sql, [ ... &#36;args ]): array.md
* public [getIdObject](getidobject.md)(string &#36;class_name, string &#36;table_name, string | int &#36;id, [ string &#36;id_col = '' ]): ?object.md
* public [getIdRow](getidrow.md)(string &#36;table_name, string | int &#36;id, [ string &#36;idcol = 'id' ]): ?array.md
* public [getObject](getobject.md)(string &#36;class_name, string &#36;sql, [ ... &#36;args ]): ?object.md
* public [getPrimaryKey](getprimarykey.md)(string &#36;table_name): ?string.md
* public [getReferencedForeignKeys](getreferencedforeignkeys.md)(string &#36;table_name): array.md
* public [getRow](getrow.md)(string &#36;sql, [ ... &#36;args ]): ?array.md
* public [getSelectCount](getselectcount.md)(PDOStatement &#36;stmt): int.md
* public [getTableNames](gettablenames.md)(): array.md
* public [getViewNames](getviewnames.md)(): array.md
* public [insert](insert.md)(string &#36;table_name, [ ... &#36;args ]): void.md
* public [insertId](insertid.md)(): ?int.md
* public [insertOrUpdate](insertorupdate.md)(string &#36;table_name, [ ... &#36;args ]): void.md
* public [numRows](numrows.md)(PDOStatement &#36;stmt): int.md
* public [query](query.md)(string &#36;sql, [ ... &#36;args ]): PDOStatement.md
* public [rollback](rollback.md)(): void.md
* public [subtractTime](subtracttime.md)(string &#36;period, int &#36;length, string &#36;from_date, [ bool &#36;return_datestamp = true ]): string.md
* public [truncate](truncate.md)(string &#36;table_name): void.md
* public [update](update.md)(string &#36;table_name, object | array &#36;updates, [ ... &#36;args ]): void.md


