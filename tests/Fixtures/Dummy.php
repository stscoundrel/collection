<?php
/**
 * Dummy entity.
 *
 * @package Collection.
 */

namespace Silvanus\Collection\Tests\Fixtures;

class Dummy
{

    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
