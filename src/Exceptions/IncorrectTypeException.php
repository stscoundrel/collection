<?php
/**
 * IncorrectTypeException exception.
 *
 * @package Collection.
 */

namespace Silvanus\Collection\Exceptions;

use \Exception;

/**
 * Handle exception for using non-allowed collection items.
 */
class IncorrectTypeException extends Exception
{
    protected $message = 'Error adding incorrect type to a typed collection.' ;
}
