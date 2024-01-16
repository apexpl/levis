
# Database Object / Connection (levis\Svc\Db)

The [Apex Database Layer](https://github.com/apexpl/db/) is a straight forward library that provides efficient access to the SQL database.  Instead of trying to be clever and force you to learn a new ORM and its methods, this simply provides an efficient means to perform prepared SQL statements protecting against SQL injection, plus other basic functionality such as map to and from objects.  To continue, click on one of the below links:

With installation, Levis is setup to utilize a SQLite database located at ~/db.sqlite which will be created first time the database is accessed.  You may switch to either mySQL or PostgreSQL by updating the database credentials within the /config/config.yml file, whch already has example mySQL database credentials.

To continue, click on one of the below links:

1. [Accessing the Database](access.md)
2. [Prepared Statements](placeholders.md)
3. [Function Reference List](../../classes/svc/db/index.md)


