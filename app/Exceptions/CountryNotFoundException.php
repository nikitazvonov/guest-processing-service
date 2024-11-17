<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class CountryNotFoundException extends Exception
{
    /** @var string */
    protected $message = 'Страна с таким кодом не найдена';

    /** @var int */
    protected $code = 404;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
