<?php

namespace Silvanus\ProjectName\Tests;

use PHPUnit\Framework\TestCase;

// SUT classes.
use Silvanus\ProjectName\Example;

final class ExampleTest extends TestCase
{

    /**
     * Instance can be created.
     *
     * @return void
     */
    public function testCanCreateInstance(): void
    {
        $this->assertInstanceOf(
            Example::class,
            new Example()
        );
    }

    /**
     * Example method works.
     *
     * @return void
     */
    public function testRetutnsSameString(): void
    {
        $example = new Example();
        $result = $example->returnSameString('lorem ipsum');

        $this->assertEquals(
            $result,
            'lorem ipsum'
        );
    }
}
