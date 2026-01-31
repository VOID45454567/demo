<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => 'required|string|regex:/[а-яА-ЯёЁ\s]/',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'login' => 'required|string|min:6|unique:users,login|regex:/[a-zA-Z0-9\s]/',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'Поле "ФИО" обязательно для заполнения.',
            'full_name.string' => 'Поле "ФИО" должно быть строкой.',
            'full_name.min' => 'Поле "ФИО" должно содержать минимум 6 символов.',
            'full_name.regex' => 'Поле "ФИО" должно содержать только кириллические буквы, пробелы и дефисы.',
            'login.required' => 'Поле "Логин" обязательно для заполнения.',
            'login.string' => 'Поле "Логин" должно быть строкой.',
            'login.unique' => 'Такой логин уже занят. Пожалуйста, выберите другой.',
            'login.min' => 'Поле "Логин" должно содержать минимум 3 символа.',
            'login.regex' => 'Поле "Логин" может содержать только латинские буквы, цифры и символ подчеркивания.',

            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.string' => 'Поле "Email" должно быть строкой.',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован.',
            'email.email' => 'Пожалуйста, введите корректный email адрес.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',

            'phone_number.required' => 'Поле "Номер телефона" обязательно для заполнения.',
            'phone_number.string' => 'Поле "Номер телефона" должно быть строкой.',
            'phone_number.regex' => 'Номер телефона должен быть в формате: 8(XXX)XXX-XX-XX',
        ];
    }
}
