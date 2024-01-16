
# Database Tips &amp; Tricks


Below lists a few efficient commands available within Levis when dealing with the database:


## Connect to Database

To connect to the SQL database prompt, within terminal simply run the command:

> `./levis sql`

Regardless if you're using mySQL, PostgreSQL or SQLite, you will find yourself at the database prompt where you can execute any desired SQL statements.


## Execute SQL Statements

Using the same command as above, you may also quickly execute SQL statements against the database.  For example:

> `levis sql "SELECT uuid,full_name FROM admin"`

This will execute the passed SQL statement against the database, and if a SELECT statement will also display the results in the same tabular format that mySQL provides.


## Dump SQL Database

If using either mySQL or PostgreSQL, you may dump the database any time with the command:

> `./levis dump-db [<FILENAME>]`

You may optionally specify a file you'd like the database dumped to, but if one is not specified, it will default to dump.sql.


