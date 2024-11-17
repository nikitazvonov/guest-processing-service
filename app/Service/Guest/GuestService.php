<?php

namespace App\Service\Guest;

use App\Domain\DTO\Guest\GuestData;
use App\Domain\DTO\Guest\GuestFilterData;
use App\Exceptions\GuestNotFoundException;
use App\Exceptions\PhoneAlreadyExistsException;
use App\Models\Guest\Guest;
use App\Repository\Guest\Abstracts\GuestRepositoryInterface;
use App\Service\Country\Abstracts\CountryServiceInterface;
use App\Service\Guest\Abstracts\GuestServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class GuestService implements GuestServiceInterface
{
    public function __construct(
        private readonly GuestRepositoryInterface $guestRepository,
        private readonly CountryServiceInterface $countryService,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function store(GuestData $data): Guest
    {
        $this->checkPhoneAlreadyExists($data->phone_code, $data->phone_number);

        if (is_null($data->country)) {
            $data->country = $this->countryService->getCountryWithPhoneCode(
                $data->phone_code,
                $data->phone_number
            );
        }

        return $this->guestRepository->create([
            'name' => $data->name,
            'surname' => $data->surname,
            'email' => $data->email,
            'phone_code' => $data->phone_code,
            'phone_number' => $data->phone_number,
            'country' => $data->country,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function update(GuestData $data, int $guestId): Guest
    {
        $guest = $this->getById($guestId);

        if (
            $data->phone_code !== $guest->phone_code
            || $data->phone_number !== $guest->phone_number
        ) {
            $this->checkPhoneAlreadyExists($data->phone_code, $data->phone_number);
        }

        $data->country = is_null($data->country) && $data->phone_code !== $guest->phone_code
            ? $this->countryService->getCountryWithPhoneCode($data->phone_code, $data->phone_number)
            : $guest->country;

        $this->guestRepository->update([
            'name' => $data->name,
            'surname' => $data->surname,
            'email' => $data->email,
            'phone_code' => $data->phone_code,
            'phone_number' => $data->phone_number,
            'country' => $data->country,
        ], $guestId);

        return $guest->refresh();
    }

    /**
     * {@inheritDoc}
     */
    public function getById(int $guestId): Guest
    {
        $guest = $this->guestRepository->findWhere([
            'id' => $guestId,
        ])->first();

        if (is_null($guest)) {
            throw new GuestNotFoundException;
        }

        return $guest;
    }

    public function filter(GuestFilterData $data): LengthAwarePaginator
    {
        return $this->guestRepository->filter($data);
    }

    /**
     * {@inheritDoc}
     */
    public function destroy(int $guestId): bool
    {
        return $this->getById($guestId)->delete();
    }

    /**
     * @throws PhoneAlreadyExistsException
     */
    private function checkPhoneAlreadyExists(int $code, string $number): void
    {
        $guestWithGivenPhone = $this->guestRepository->getWithPhone($code, $number);

        if (! is_null($guestWithGivenPhone)) {
            throw new PhoneAlreadyExistsException;
        }
    }
}
