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

    /**
     * Run type checks before parent constructor,
     *
     * @param array $input
     */
    public function __construct($input = array())
    {
        /** @var object */
        foreach ($input as $value) :
            $this->checkValueIsValid($value);
        endforeach;

        parent::__construct($input);
    }

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
    public function offsetSet($index, $value) : void
    {
        $this->checkValueIsValid($value);
        parent::offsetSet($index, $value);
    }

    /**
     * Ensure given value is usable in collection.
     *
     * @param mixed $value
     * @return void
     */
    private function checkValueIsValid($value) : void
    {
        if (! is_object($value)) :
            throw new NotAnObjectException();
        endif;

        if (! $this->matchesType($value)) :
            throw new IncorrectTypeException();
        endif;
    }
}
