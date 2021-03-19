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

final class CollectionTest extends TestCase
{

    /**
     * Instance can be created.
     *
     * @return void
     */
    public function testCanCreateInstance(): void
    {
        $this->assertInstanceOf(
            AbstractCollection::class,
            new DummyCollection()
        );
    }

    /**
     * Accepts correctly typed objects
     *
     * @return void
     */
    public function testAcceptsCorrectTypesOfObjects(): void
    {
        $collection = new DummyCollection();
        $collection[] = new Dummy(1);
        $collection[] = new Dummy(2);

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
    public function testErrorsOnNonObjects(): void
    {
        $this->expectException(NotAnObjectException::class);

        $collection = new DummyCollection();
        $collection[] = 'a random string';
    }

    /**
     * Errors on non-objects
     *
     * @return void
     */
    public function testErrorsOnIncorrectType(): void
    {
        $this->expectException(IncorrectTypeException::class);

        $collection = new DummyCollection();
        $collection[] = new DateTime();
    }

    /**
     * Collection can be iterated
     *
     * @return void
     */
    public function testCollectionCanBeIterated(): void
    {
        $collection = new DummyCollection();
        $collection[] = new Dummy(0);
        $collection[] = new Dummy(1);
        $collection[] = new Dummy(2);
        $collection[] = new Dummy(3);
        $collection[] = new Dummy(4);

        foreach ($collection as $index => $item) :
            $this->assertInstanceOf(
                Dummy::class,
                $item
            );

            $this->assertEquals(
                $index,
                $item->id
            );
        endforeach;
    }

    /**
     * Items can be set/unset by index.
     *
     * @return void
     */
    public function testCollectionItemsCanBeSetAndUnsetByIndex(): void
    {
        $collection = new DummyCollection();
        $collection[123] = new Dummy(2);
        $collection[555] = new Dummy(4);
        $collection['random'] = new Dummy(6);

        $this->assertEquals(
            2,
            $collection[123]->id
        );

        $this->assertEquals(
            4,
            $collection[555]->id
        );

        $this->assertEquals(
            6,
            $collection['random']->id
        );
    }
}
