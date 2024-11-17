<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class InvalidPhoneCodeException extends Exception
{
    /** @var string */
    protected $message = 'Неверный формат кода номера телефона';

    /** @var int */
    protected $code = 422;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
