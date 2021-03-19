<?php
/**
 * Dummy collection.
 *
 * @package Collection.
 */

namespace Silvanus\Collection\Tests\Fixtures;

use Silvanus\Collection\AbstractCollection;

class DummyCollection extends AbstractCollection
{
    protected function getType() : string
    {
        return 'Silvanus\Collection\Tests\Fixtures\Dummy';
    }
}
