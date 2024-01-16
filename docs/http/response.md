
# PSR7 Response

All HTTP controllers must return a PSR7 compliant [ResponseInterface object](https://www.php-fig.org/psr/psr-7/).  By default Apex utilizes the nyholm/psr7 package to generate PSR7 requests and responses, but you may use any PSR7 compliant package such as Guzzle or any that you wish.  Below gives some example PSR7 responses that can be used within HTTP controllers for reference.


## Render View

~~~PHP
// Render view at /views/html/some_dir/my_view.html
$html = $this->view->render('some_dir/my_view');

// Return response
$res = new Response(
    status: 200,
    body: $html
);
return $res;
~~~


## 401 Unauthorized

~~~php
$res = new Response(
    status: 401,
    body: You do not have authorization."
);

return $res;
~~~


## JSON object

~~~php
$json = json_encode($some_result_array);

$res = (new Response(body: $json))
    ->withStatus(200) 
    ->withAddedHeader('Content-type', 'application/json');

return $res;
~~~

## Redirect

~~~php
$headers = [
    'Location' => 'https://new-url.com/whatever'
];

$res = new Response(
    status: 301,
    headers: $headers
);

return $res;
~~~


