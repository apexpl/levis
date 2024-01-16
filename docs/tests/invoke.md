
# Invoke Private / Protected Method

Sometimes you will need to invoke a private / protected method for testing.  Levis offers a simple [invokeMethod()](../classes/app/utils/tests/levistestcase/invokemethod.md) within the testing library to facilitate this.  For example:

~~~php
public function testInvoke(): void
{


    $obj = new MyObject();
    $res = $this->invokeMethod($obj, 'myProtectedMethod', ['abc', '123']);
    $this->assertEquals($res, 'yes');

}
~~~

The above creates a new instance of `MyObject()`, calls the private / protected method of `myProtectedMethod()`, then returns the result.










