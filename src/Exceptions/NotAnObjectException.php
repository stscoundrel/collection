<?php
/**
 * NotAnObjectException exception.
 *
 * @package Collection.
 */

namespace Silvanus\Collection\Exceptions;

use \Exception;

/**
 * Handle exception for using non-object collection items.
 */
class NotAnObjectException extends Exception
{
    protected $message = 'Error adding non-object to a typed collection.' ;
}
