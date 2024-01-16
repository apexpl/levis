
# CLI Command - `sql`

**Title:** Execute SQL query or connect to database prompt.

**Usage:** `./levis sql [<QUERY>] [--file=<FILE>]`

**Description:** If no arguments ar provided, will connect you directly to the prompt of the mySQL, PostgreSQL or SQLite database.  If a SQL query is provided will execute against the database, and display any resulting rows if a SELECT statement.  If `--file` is specified will execute all SQL queries within the specified filename.

**Example:** 

> `./levis sql`
> `./levis sql "SELECT id,username FROM armor_users`
> `./levis sql --file=some_querieis.sql`




