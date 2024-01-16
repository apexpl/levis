
# Send levis CLI Command

You may emulate a CLI command sent to the `levis` script by using the [levis()](../classes/app/utils/tests/levistestcase/levis.md) method.  For example:

~~~php
public function testApexCli(): void
{

    $res = $this->levis('some-category my-job', ['test', '1234']);
    $this->assertStringContainsString("Success", $res);
}
~~~


Essentially, the above will call the CLI command located at /src/Console/SomeCategory/MyJob.php with the arguments "test" and "1234", then return its results.  For details, please visit the [apex() method documentation page](/docs/classes/app/sys/tests/apextestcase/apex) page of the documentation.




