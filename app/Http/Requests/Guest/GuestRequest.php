<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

final class GuestRequest extends FormRequest
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
     * @return array<string, string|array<int, string|Rule>>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('guests', 'email')
                    ->ignore(
                        intval(Request::route('guest_id'))
                    ),
            ],
            'phone_code' => 'required|integer|min:1|max:999',
            'phone_number' => 'required|string|min:1|max:14|regex:/^\d+$/',
            'country' => 'nullable|string|max:255',
        ];
    }
}
