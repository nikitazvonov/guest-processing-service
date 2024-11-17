<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class GuestNotFoundException extends Exception
{
    /** @var string */
    protected $message = 'Данный гость не существует';

    /** @var int */
    protected $code = 404;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
