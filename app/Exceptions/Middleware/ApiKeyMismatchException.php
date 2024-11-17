<?php

namespace App\Exceptions\Middleware;

use Exception;
use Throwable;

final class ApiKeyMismatchException extends Exception
{
    /** @var string */
    protected $message = 'Ключ авторизации недействителен или отсутствует';

    /** @var int */
    protected $code = 401;

    public function __construct(?Throwable $previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}
