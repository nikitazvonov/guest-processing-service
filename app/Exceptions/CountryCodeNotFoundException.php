<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class CountryCodeNotFoundException extends Exception
{
    /** @var string */
    protected $message = 'Не найден код страны для данного номера телефона';

    /** @var int */
    protected $code = 404;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
