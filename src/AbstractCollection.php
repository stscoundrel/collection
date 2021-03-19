<?php
/**
 * AbstractCollection class.
 *
 * @package Collection.
 */

namespace Silvanus\Collection;

// Exceptions.
use Silvanus\Collection\Exceptions\IncorrectTypeException;
use Silvanus\Collection\Exceptions\NotAnObjectException;

use \ArrayObject;

abstract class AbstractCollection extends ArrayObject
{

    abstract protected function getType() : string;

    /**
     * Ensures value matches collection type
     *
     * @param object $value
     * @return boolean
     */
    private function matchesType($value) : bool
    {
        return get_class($value) === $this->getType();
    }

    /**
     * Assign item. Check type first.
     *
     * @param mixed $index
     * @param mixed $value
     * @return void
     */
    public function offsetSet($index, $value)
    {
        if (! is_object($value)) :
            throw new NotAnObjectException();
        endif;

        if (! $this->matchesType($value)) :
            throw new IncorrectTypeException();
        endif;

        parent::offsetSet($index, $value);
    }
}
