
# HTTP Router

Levis comes with a straight forward interopable HTTP router.

## Basic Routes

All routes are stored within the /config/routes.yml file, which defines which HTTP controller / middleware class each request will be forwarded to for processing.  Below shows a small routes.yml example file:

~~~
routes:
    admin: Webapp\AdminPanel
    ajax: Webapp\Ajax
    members: MembersArea
    default: PublicSite
~~~

With the abov, the beginning of the URI being requested only needs to match the route to be considered a hit.  For example, upon visiting the URL:

> https://localhost/admin/users/create

Since the URI begins with `admin`, it matches the first route in the above example, meaning the request will be forwarded to the `Webapp\AdminPanel` HTTP controller for processing.  When the URI for a request does not match any of the routes, it will be forwarded to the `default` route, which in the case of the above example is the `PublicSite` route which simply uses auto-routing as explained later in this section.


## Full Match Routes

Routes that require full matches to be triggered can be defined vy simply placing a `$` sign at the end of the route, for example within the /boot/routes.yml file:

> `'catalog$': CatalogViewer`

The above route will only be triggered if the URI is exactly http://localhost/catalog.  If someone visits for example, http://localhost/catalog/electronics the above route will not be triggered due to the `$` sign at the end meaning a full match is required.



## Dynamic Path Parameters

Routes may also contain dynamic elements within the path / URI.  This is done by simply placing a colon in front of the desired URI element within the route definition, for example:

>   `'products/:category/:product_id': ViewProduct`

With the above route, the `:category` and `:product_id` elements are dynamic and can be anything.  The values can be retrieved via the [App::pathParam](../classes/app/pathparam.md) method.  For example, if visiting the URL:

> http://localhost/products/laptops/dell38814

The above URL will trigger the route, forwarding the request to the `ViewProduct` HTTP controller for processing.  The values of the two dynamic path parameters can then be retrived with for example:

~~~php
$category = $app->pathParam('category');     // laptops
$product_id = $app->pathParam('product_id');    // dell38814
~~~



# Multi Host Routes

Multi host routing is also fully supported for times when multiple domains or sub-domains are pointing to the same Levis installation and need to have different route definitions.  Below is an example of a /config/routes.yml file for a multi-host setup:

~~~
routes:

    wiki.domain.com:
        admin/: WikiAdmin
        default: Wiki
    generic-support.com:
        clients: ClientSupportArea
        default: GenericSupportArea
    default:
        api/: RestApi
        default: PublicSite
~~~

With the above, all HTTP requests to the host wiki.domain.com will be passed to either the `WikiAdmin` or `Wiki` HTTP controllers, the generic-support.com is also supported, and all other HTTP requests will be handled by the other default set of route definitions.

Multi-host setups are the same as single-host, the only difference being the parent values under `routes` are the hostnames and the child elements of each are the routes for that particular host.




