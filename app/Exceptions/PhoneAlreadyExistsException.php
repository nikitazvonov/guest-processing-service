<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class PhoneAlreadyExistsException extends Exception
{
    /** @var string */
    protected $message = 'Номер телефона уже зарегистрирован';

    /** @var int */
    protected $code = 422;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
