<?php

namespace App\Service\Guest\Abstracts;

use App\Domain\DTO\Guest\GuestData;
use App\Domain\DTO\Guest\GuestFilterData;
use App\Exceptions\CountryCodeNotFoundException;
use App\Exceptions\CountryNotFoundException;
use App\Exceptions\GuestNotFoundException;
use App\Exceptions\InvalidPhoneCodeException;
use App\Exceptions\PhoneAlreadyExistsException;
use App\Models\Guest\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestServiceInterface
{
    /**
     * @throws PhoneAlreadyExistsException
     * @throws CountryCodeNotFoundException
     * @throws InvalidPhoneCodeException
     * @throws CountryNotFoundException
     */
    public function store(GuestData $data): Guest;

    /**
     * @throws GuestNotFoundException
     * @throws PhoneAlreadyExistsException
     * @throws CountryCodeNotFoundException
     * @throws InvalidPhoneCodeException
     * @throws CountryNotFoundException
     */
    public function update(GuestData $data, int $guestId): Guest;

    /**
     * @throws GuestNotFoundException
     */
    public function getById(int $guestId): Guest;

    public function filter(GuestFilterData $data): LengthAwarePaginator;

    /**
     * @throws GuestNotFoundException
     */
    public function destroy(int $guestId): bool;
}
