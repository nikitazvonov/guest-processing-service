<?php

namespace App\Repository\Guest\Abstracts;

use App\Domain\DTO\Guest\GuestFilterData;
use App\Models\Guest\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

interface GuestRepositoryInterface extends RepositoryInterface
{
    public function filter(GuestFilterData $data): LengthAwarePaginator;

    public function getWithPhone(int $code, string $number): ?Guest;
}
