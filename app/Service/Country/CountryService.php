<?php

namespace App\Service\Country;

use App\Exceptions\CountryCodeNotFoundException;
use App\Exceptions\CountryNotFoundException;
use App\Exceptions\InvalidPhoneCodeException;
use App\Service\Country\Abstracts\CountryServiceInterface;
use Exception;
use libphonenumber\PhoneNumberUtil;

class CountryService implements CountryServiceInterface
{
    private PhoneNumberUtil $phoneNumberClient;

    public function __construct()
    {
        $this->phoneNumberClient = PhoneNumberUtil::getInstance();
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryWithPhoneCode(int $code, string $number): string
    {
        try {
            $regionCode = $this->phoneNumberClient->getRegionCodeForNumber(
                $this->phoneNumberClient->parse("+$code".$number)
            );
        } catch (Exception $exception) {
            throw new InvalidPhoneCodeException;
        }

        if (is_null($regionCode)) {
            throw new CountryCodeNotFoundException;
        }

        return $this->getCountryWithRegionCode($regionCode);
    }

    /**
     * @throws CountryNotFoundException
     */
    private function getCountryWithRegionCode(string $regionCode): string
    {
        $countries = include base_path(config('packages.paths.countries_in_russian'));
        $currentCountry = $countries[$regionCode] ?? null;

        if (is_null($currentCountry)) {
            throw new CountryNotFoundException;
        }

        return $currentCountry;
    }
}
