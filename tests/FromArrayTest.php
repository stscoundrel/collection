<?php

namespace Silvanus\Collection\Tests;

use PHPUnit\Framework\TestCase;

// SUT classes.
use Silvanus\Collection\AbstractCollection;

// Exceptions.
use Silvanus\Collection\Exceptions\IncorrectTypeException;
use Silvanus\Collection\Exceptions\NotAnObjectException;

// Fixtures
use Silvanus\Collection\Tests\Fixtures\Dummy;
use Silvanus\Collection\Tests\Fixtures\DummyCollection;

use \DateTime;

final class FromArrayTest extends TestCase
{

    /**
     * Can populate instance from array
     *
     * @return void
     */
    public function testPopulatesInstanceFromArray(): void
    {
        $array = array( new Dummy(1), new Dummy(2), new Dummy(3) );
        $collection = new DummyCollection($array);

        $this->assertInstanceOf(
            Dummy::class,
            $collection[0]
        );

        $this->assertEquals(
            1,
            $collection[0]->id
        );

        $this->assertEquals(
            2,
            $collection[1]->id
        );
    }

    /**
     * Errors on incorrect types of items.
     *
     * @return void
     */
    public function testErrorsOnIncorrectArrayPopulation(): void
    {
        $this->expectException(NotAnObjectException::class);
        $array = array(1, 2, 3);
        $collection = new DummyCollection($array);
    }

    /**
     * Errors on non-objects
     *
     * @return void
     */
    public function testErrorsOnIncorrectType(): void
    {
        $this->expectException(IncorrectTypeException::class);

        $array = array(new DateTime());
        $collection = new DummyCollection($array);
    }
}
