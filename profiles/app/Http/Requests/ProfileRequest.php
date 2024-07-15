<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        $profileId = $this->route('profile') ? $this->route('profile')->id : null;
        return [
            'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                 Rule::unique('profile')->ignore($profileId)
            ],
            'password' => 'required|min:9|max:16|confirmed',
            'bio' => 'required',
            'image' => 'image|mimes:png,svg,jpg,jpeg|max:10240',
        ];
    }
}
