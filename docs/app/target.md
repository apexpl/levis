
# Target Resource

The central `App` class contains the following methods to obtain information on the resource being requested.  Unless specified, the below methods are aliases that retrieve information from the PSR-7 `ServerRequest` object.

## Getter Methods

* [getHost](../classes/app/gethost.md) ():string
* [getPort](../classes/app/getport.md) ():int
* [getMethod](../classes/app/getmethod.md) ():string - The request method (ie. POST, GEt, et al).
* [getPath](../classes/app/getpath.md) ():string
* [getContentType](../classes/app/getgetcontenttype.md) ():string
* [getRequest](../classes/app/getrequest.md) ():ServerRequestInterface - Returns the current PSR-15 compliant `ServerRequestInterface` object.
* [getUri](../classes/app/geturi.md) ():UriInterface - Returns the current PSR-7 compliant `UriInterface` object.

## Setter Methods

* [setPath](../classes/app/setpath.md) (string $path, bool $is_locked = false):bool
* [setRequest](../classes/app/setrequest.md) (?ServerRequestInterface $request = null):void


