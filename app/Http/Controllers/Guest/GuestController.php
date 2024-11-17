<?php

namespace App\Http\Controllers\Guest;

use App\Domain\DTO\Guest\GuestData;
use App\Domain\DTO\Guest\GuestFilterData;
use App\Exceptions\CountryCodeNotFoundException;
use App\Exceptions\GuestNotFoundException;
use App\Exceptions\InvalidPhoneCodeException;
use App\Exceptions\PhoneAlreadyExistsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\GuestFilterRequest;
use App\Http\Requests\Guest\GuestRequest;
use App\Http\Resources\Guest\GuestResource;
use App\Service\Guest\Abstracts\GuestServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class GuestController extends Controller
{
    public function __construct(private readonly GuestServiceInterface $guestService) {}

    public function store(GuestRequest $request): GuestResource
    {
        return GuestResource::make(
            $this->guestService->store(
                GuestData::from($request->validated())
            )
        );
    }

    /**
     * @throws GuestNotFoundException
     * @throws PhoneAlreadyExistsException
     * @throws CountryCodeNotFoundException
     * @throws InvalidPhoneCodeException
     */
    public function update(GuestRequest $request, int $guestId): GuestResource
    {
        return GuestResource::make(
            $this->guestService->update(
                GuestData::from($request->validated()),
                $guestId
            )
        );
    }

    /**
     * @throws GuestNotFoundException
     */
    public function show(int $guestId): GuestResource
    {
        return GuestResource::make(
            $this->guestService->getById($guestId)
        );
    }

    public function index(GuestFilterRequest $request): AnonymousResourceCollection
    {
        return GuestResource::collection(
            $this->guestService->filter(
                GuestFilterData::from($request->validated())
            )
        );
    }

    public function destroy(int $guestId): JsonResponse
    {
        return response()->json([
            'result' => $this->guestService->destroy($guestId),
        ]);
    }
}
