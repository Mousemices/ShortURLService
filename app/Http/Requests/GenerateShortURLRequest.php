<?php

namespace App\Http\Requests;

use App\Services\Internal\Protocol\Protocol;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class GenerateShortURLRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'destination_url' => ['required', 'string', 'url'],
            'short_code' => ['nullable', 'string']
        ];
    }

    protected function prepareForValidation(): void
    {
        if (! Str::startsWith($this->destination_url, Protocol::supported())) {
            $this->merge([
                'destination_url' => Protocol::http . $this->destination_url
            ]);
        }
    }
}
