<?php

namespace App\Http\Requests;

use App\Constants\GlobalConstant;
use App\Enums\UserRoleEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            "name"                  => ['required', 'string'],
            "email"                 => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            "phone"                 => ['required', 'string'],
            "role"                  => ['required', Rule::enum(UserRoleEnum::class)],
            "status"                => ['required'],
            "password"              => ['required', 'confirmed', 'min:8'],
            "password_confirmation" => ['required', 'min:8'],
        ];

        if($this->user){
            $rules['password']              = ['nullable', 'confirmed', 'min:8'];
            $rules['password_confirmation'] = ['nullable', 'min:8'];
        }

        return $rules;
    }
}
