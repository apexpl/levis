
# Create Unit Test

You may create a new unit test by using the [create test CLI command](../cli/test.md), for example:

> `./levis create test images`

This would create a new file at /tests/ImagesTest.php, which will be executed when phpUnit is run.  You may develop this class out exactly as you would any phpUnit class plus with the added [methods](../classes/app/utils/tests/levistestcase/index.md).

Below is an example PHP class that would be initially generated:

~~~php
<?php
declare(strict_types = 1);

namespace Tests;

use Levis\App\Utils\Tests\LevisTestCase;

/**
 * Images Test
 */
class ImagesTest extends LevisTestCase
{

    /**
     * Example test
     */
    public function testExample():void
    {
        $this->assertTrue(true);
    }

}



~~~




