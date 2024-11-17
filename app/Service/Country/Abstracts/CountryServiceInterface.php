<?php

namespace App\Service\Country\Abstracts;

use App\Exceptions\CountryCodeNotFoundException;
use App\Exceptions\CountryNotFoundException;
use App\Exceptions\InvalidPhoneCodeException;

interface CountryServiceInterface
{
    /**
     * @throws CountryCodeNotFoundException
     * @throws InvalidPhoneCodeException
     * @throws CountryNotFoundException
     */
    public function getCountryWithPhoneCode(int $code, string $number): string;
}
