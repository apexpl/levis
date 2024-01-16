
# levis CLI Commands

You will notice a `levis` file within the installation directory.  This is a PHP script that allows the execution of both, CLI commands you develop and a few system CLI commands for things such as automated class generation.  Below explains all system CLI commands available:

## Code Creation

Although you're welcome to create all these PHP classes manually, to help aid in your development you may have the following classes automatically generated:

Command | Description
------------- |------------- 
[create api](api.md) | REST API Endpoint
[create cli](cli.md) | Concole command.
[create http-controller](http-controller.md]) | HTTP Controller / Middleware.
[create model](model.md) | Database model.
[create test](test.md) | Unit test class.
[create view](view.md) | View


## Database

There are also a couple commands for database communication, listed below:

Command | Description
------------- |------------- 
[sql](sql.md) | Execute SQL commands against database or connect to database prompt.
[dump-db](dump-db.md) | Dump SQL database to a file.


