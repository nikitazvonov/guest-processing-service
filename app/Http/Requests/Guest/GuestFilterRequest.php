<?php

namespace App\Http\Requests\Guest;

use App\Http\Requests\Misc\PaginationRequest;

final class GuestFilterRequest extends PaginationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
        ]);
    }
}
