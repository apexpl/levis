
# Request Inputs

All inputs (form fields, query string, cookies, etc.) can be retrieved from the centro Levis\App\App object.  Below 
explains all functions available from the `$app` object.

## POST Inputs

* [post](../classes/app/post.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [hasPost](../classes/app/haspost.md) (string $key):bool
* [getAllPost](../classes/app/getallpost.md) ():array
* [clearPost](../classes/app/clearpost.md) ():void
* [replacePost](../classes/app/replacepost.md) (array $values):void


## GET Inputs

* [get](../classes/app/get.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [hasGet](../classes/app/hasget.md) (string $key):bool
* [getAllGet](../classes/app/getallget.md) ():array
* [clearGet](../classes/app/clearget.md) ():void
* [replaceGet](../classes/app/replaceget.md) (array $values):void


## REQUEST Inputs

* [request](../classes/app/request.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [hasRequest](../app/classes/app/hasrequest.md) (string $key):bool
* [getAllRequest](../app/classes/app/getAllrequest.md) ():array
* [clearPostGet](../classes/app/clearpostget.md) ():void


## Cookies

* [cookie](../classes/app/cookie.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [setCookie](../classes/app/setcookie.md) (string $name, string $value, [int $expires = 0], [?array $options = null]):void
* [hasCookie](../classes/app/hascookie.md) (string $key):bool
* [getAllCookie](../classes/app/getallcookie.md) ():array
* [clearCookie](../classes/app/clearcookie.md) ():void
* [replaceCookie](../classes/app/replacecookie.md) (array $values):void


## Dynamic Path Parameters

* [pathParam](../classes/app/pathparam.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [hasPathParam](../classes/app/haspathparam.md) (string $key):bool
* [getAllPathParams](../classes/app/getallpathparam.md) ():array
* [replacePathParams](../classes/app/replacepathparams.md) (array $values):void


## Uploaded Files

* file(string $key): array
* hasFile(string $key): bool
* getAllFile(): array
* clearFile(): void
* fileName(string $key): ?string
* fileTmpName(string $key): ?string
* fileType(string $key): ?string
* fileContents(string $key): ?string
* fileStream(string $key): ?stream


## SERVER Variables

* [server](../classes/app/server.md) (string $key, ?string $default = null, string $filters = 'escape'):?string
* [hasServer](../classes/app/hasserver.md) (string $key):bool
* [getAllServer](../classes/app/getallserver.md) ():array
* [replaceServer](../classes/app/replaceserver.md) (array $values):void


## Filters

Each of the methods that allow you to retrive a single variable contain a `$filters` parameter, which is a string of words delimited by a period and defines the filters to apply to the variable before returning it.  Below explains the available filters:

* trim - Passes the variable through the trim() function, stripping whitespace from both sides.
* escape - Applies the `filter_var()` function with option `FILTER_UNSAFE_RAW`
* lower - Lowercases the value
* upper - Uppercases the value
* title - Titlecases the value
* strip_tags - Applies the `strip_tags()` function against the value
* digit - Deletes all non-digit characters from the value.


