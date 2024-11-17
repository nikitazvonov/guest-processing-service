<?php

namespace App\Domain\DTO\Misc;

use Spatie\LaravelData\Dto;

class PaginationData extends Dto
{
    public function __construct(
        public ?int $page,
        public ?int $per_page = 10,
    ) {}
}
