<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'departure_location' => 'required|string|max:255',
            'departure_date' => 'required|date|before_or_equal:arrival_date',
            'departure_time' => 'required|date_format:H:i',
            'arrival_location' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'departure_date.before_or_equal' => 'Дата отправления не может быть позже даты прибытия.',
        ];
    }
}
