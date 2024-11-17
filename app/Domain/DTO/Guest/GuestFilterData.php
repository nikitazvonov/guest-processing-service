<?php

namespace App\Domain\DTO\Guest;

use App\Domain\DTO\Misc\PaginationData;

final class GuestFilterData extends PaginationData
{
    public function __construct(
        public ?string $name = null,
        public ?string $surname = null,
        public ?string $country = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?int $page = null,
        public ?int $per_page = 10
    ) {
        parent::__construct($page, $per_page);
    }
}
