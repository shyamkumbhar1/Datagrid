<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class FamilyHeadRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthdate' => 'required|date|before:' . Carbon::now()->subYears(21)->toDateString(),
            'mobile_no' => 'required|numeric|digits:10',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|numeric|digits:6',
            'marital_status' => 'required|in:Married,Unmarried',
            'wedding_date' => 'nullable|date|after_or_equal:' . Carbon::parse($this->birthdate)->addYears(18)->toDateString(),
            'hobbies' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'birthdate.before' => 'Age must be greater than 21.',
            'wedding_date.after_or_equal' => 'The wedding date must be at least 18 years after the birthdate.',
        ];
    }
    protected function prepareForValidation()
    {
        // Convert hobbies array to JSON string before validation
        if ($this->has('hobbies')) {
            $this->merge([
                'hobbies' => json_encode($this->hobbies),
            ]);
        }
    }
}
