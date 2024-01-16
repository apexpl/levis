
# Levis\App\App

> Central app class for Levis

* public [__construct](__construct.md)():.md
* public [bootload](bootload.md)([ string &#36;boot_type = 'app' ]):.md
* public [clearCookie](clearcookie.md)(): void.md
* public [clearFile](clearfile.md)(): void.md
* public [clearGet](clearget.md)(): void.md
* public [clearPost](clearpost.md)(): void.md
* public [clearPostGet](clearpostget.md)(): void.md
* public [config](config.md)(string &#36;key, [  &#36;default = null ]): ?mixed.md
* public [cookie](cookie.md)(string &#36;key, [  &#36;default = null ], [ string &#36;filters = 'escape' ]): ?mixed.md
* public [file](file.md)(string &#36;key): ?array.md
* public [fileContents](filecontents.md)(string &#36;key): ?string.md
* public [fileName](filename.md)(string &#36;key): ?string.md
* public [fileStream](filestream.md)(string &#36;key): ?stream.md
* public [fileTmpName](filetmpname.md)(string &#36;key): ?string.md
* public [fileType](filetype.md)(string &#36;key): ?string.md
* public [filter](filter.md)( &#36;value, string &#36;filters):.md
* public [get](get.md)(string &#36;key, [  &#36;default = null ], [ string &#36;filters = 'escape' ]): ?mixed.md
* public [getAllConfig](getallconfig.md)(): array.md
* public [getAllCookie](getallcookie.md)(): array.md
* public [getAllFile](getallfile.md)(): array.md
* public [getAllGet](getallget.md)(): array.md
* public [getAllPathParams](getallpathparams.md)(): array.md
* public [getAllPost](getallpost.md)(): array.md
* public [getAllRequest](getallrequest.md)(): array.md
* public [getAllServer](getallserver.md)(): array.md
* public [getBootType](getboottype.md)(): string.md
* public [getContainer](getcontainer.md)(): ApexContainerInterface.md
* public [getContentType](getcontenttype.md)(): string.md
* public [getHost](gethost.md)(): string.md
* public [getMethod](getmethod.md)(): string.md
* public [getPath](getpath.md)(): string.md
* public [getPort](getport.md)(): int.md
* public [getRequest](getrequest.md)(): ServerRequestInterface.md
* public [handle](handle.md)(ServerRequestInterface &#36;request): ResponseInterface.md
* public [hasConfig](hasconfig.md)(string &#36;key): bool.md
* public [hasCookie](hascookie.md)(string &#36;key): bool.md
* public [hasFile](hasfile.md)(string &#36;key): bool.md
* public [hasGet](hasget.md)(string &#36;key): bool.md
* public [hasPathParam](haspathparam.md)(string &#36;key): bool.md
* public [hasPost](haspost.md)(string &#36;key): bool.md
* public [hasRequest](hasrequest.md)(string &#36;key): bool.md
* public [hasServer](hasserver.md)(string &#36;key): bool.md
* public [outputResponse](outputresponse.md)(ResponseInterface &#36;response): void.md
* public [pathParam](pathparam.md)(string &#36;key, [  &#36;default = null ]):.md
* public [post](post.md)(string &#36;key, [  &#36;default = null ], [ string &#36;filters = 'escape' ]): ?mixed.md
* public [replaceCookie](replacecookie.md)(array &#36;values): void.md
* public [replaceGet](replaceget.md)(array &#36;values): void.md
* public [replacePathParams](replacepathparams.md)(array &#36;values): void.md
* public [replacePost](replacepost.md)(array &#36;values): void.md
* public [replaceServer](replaceserver.md)(array &#36;values): void.md
* public [request](request.md)(string &#36;key, [  &#36;default = null ], [ string &#36;filters = 'escape' ]): ?mixed.md
* public [server](server.md)(string &#36;key, [  &#36;default = null ], [ string &#36;filters = 'escape' ]): ?mixed.md
* public [setCookie](setcookie.md)(string &#36;name, string &#36;value, [ int &#36;expires = '0' ], [ ?array &#36;options = null ]): void.md
* public [setRequest](setrequest.md)([ ?ServerRequestInterface &#36;request = null ]): void.md


