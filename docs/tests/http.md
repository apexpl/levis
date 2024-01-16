
# Send HTTP Request

Within unit tests you can easily emulate a HTTP request to the system using the built-in [http() method](../classes/app/utils/tests/levistestcase/http.md).  Below are some examples of this.

## Simple Example

Below will simply send a GET request to /test_page and check whether or not the page title is equal to "This is a Test".

~~~php
public function testSomeRequest(): void
{

    // Send http request
    $html = $this->http('test_page');
    $this->assertStringContainsString('This is a Test Page', $html);
}
~~~

## POST Example

Below sends a POST request to /contact checked the page title contains "Thank You", checks the resulting page contains a certain callout, and ensures the correct entry ended up in the database.
~~~php
public function testContactPost(): void
{

    // Set post variables
    $post = [
        'from_name' => 'Joohn Doe',
        'from_email' => 'john.doe@example.com',
        'subject' => 'Test Subject',
        'contents' => 'This is my message'
    ];

    // Send request
    $html = $this->http('contact', 'POST', $post):

    // Assertions
    $this->assertStringContainsString('Thank You', $html);
}
~~~




 



