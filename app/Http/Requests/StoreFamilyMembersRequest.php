<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyMembersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'family_members.*.name' => 'required|string',
            'family_members.*.birthdate' => 'required|date',
            'family_members.*.photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
