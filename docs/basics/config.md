
# /config/ Directory

The /config/ directory contains various system wide configuration files, as explained in the below table.

Filename | Description
-------------| ------------- 
config.yml | Contains all configuration variables available via the `$app->config()` method, including SQL database and SMTP server credentials.
[container.php]container) | The dependancy injection container definitions file.
[routes.yml](../http/router) | Configuration file for the HTTP router that handles all routes and which HTTP controller they are forwarded to for processing.

