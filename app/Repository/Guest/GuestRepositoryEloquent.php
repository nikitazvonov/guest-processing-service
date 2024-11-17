<?php

namespace App\Repository\Guest;

use App\Domain\DTO\Guest\GuestFilterData;
use App\Models\Guest\Guest;
use App\Repository\Guest\Abstracts\GuestRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Prettus\Repository\Eloquent\BaseRepository;

final class GuestRepositoryEloquent extends BaseRepository implements GuestRepositoryInterface
{
    public function model(): string
    {
        return Guest::class;
    }

    public function filter(GuestFilterData $data): LengthAwarePaginator
    {
        $builder = $this->model->newQuery()
            ->select('guests.*');

        if (! is_null($data->name)) {
            $builder->where('name', 'ilike', "%$data->name%");
        }
        if (! is_null($data->surname)) {
            $builder->where('surname', 'ilike', "%$data->surname%");
        }
        if (! is_null($data->country)) {
            $builder->where('country', 'ilike', "%$data->country%");
        }
        if (! is_null($data->phone)) {
            $builder->whereRaw('CONCAT(CAST(phone_code as TEXT), phone_number) = ?', Arr::wrap($data->phone));
        }
        if (! is_null($data->email)) {
            $builder->where('email', '=', $data->email);
        }

        return $builder->paginate($data->per_page);
    }

    public function getWithPhone(int $code, string $number): ?Guest
    {
        return $this->findWhere([
            'phone_code' => $code,
            'phone_number' => $number,
        ])->first();
    }
}
