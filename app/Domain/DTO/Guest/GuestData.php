<?php

namespace App\Domain\DTO\Guest;

use Spatie\LaravelData\Dto;

final class GuestData extends Dto
{
    public function __construct(
        public string $name,
        public string $surname,
        public string $email,
        public int $phone_code,
        public string $phone_number,
        public ?string $country = null,
    ) {}
}
