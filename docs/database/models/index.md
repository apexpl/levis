
# Database Models

Levis provides a clean, straight forward models implementation.  In essence, you write the SQL database schema, and Levis will generate the necessary PHP model classes based on the database tables.

The model classes generated will include all properties utilizing constructor property promotion, taking into account column type, default value, nullable, et al.  All foreign keys will also be evaluated with the necessary methods generated to retrieve any parent / child objects.

To continue, click on one of the below links:

1. [Example Model](example.md)
2. [Generate Models](generate.md)
3. [Insert Records](insert.md)
4. [Retrieve Records](select.md)
5. [Update and Delete Records](update.md)

        [Function Reference List](/docs/classes/app/base/model/basemodel/)




