<?php

namespace App\Http\Requests\applications;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "prefer_date" => "required|date_format:d.m.Y|after_or_equal:today",
            "course_id" => "required|integer|exists:courses,id",
            "payment_method" => "required|in:by_number,cash",
        ];
    }

    public function messages(): array
    {
        return [
            "prefer_date.required" => "Обязательно",
            "prefer_date.date_format" => "Некорректный формат",
            "prefer_date.after_or_equal" => "Не раньше чем сегодня",
            "course_id.required" => "Обязательно",
            "course_id.integer" => "Должно быть целым числом",
            "course_id.exists" => "Курс не существует",
            "payment_method.required" => "Обязательно",
            "payment_method.in" => "Только из инпутов",
        ];
    }
}
