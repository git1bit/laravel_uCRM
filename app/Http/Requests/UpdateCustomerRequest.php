<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'm_name' => ['nullable', 'max:20'],
            'tel1' => ['nullable', 'numeric'],
            'tel2' => ['nullable', 'numeric'],
            'postcode' => ['nullable', 'max:7'],
            'address1' => ['nullable', 'max:255'],
            'address2' => ['max:255'],
            'temple' => ['nullable', 'max:255'],
            's_name1' => ['required', 'max:20'],
            'f_name1' => ['nullable', 'max:20'],
            's_ruby1' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:50'],
            'f_ruby1' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:50'],
            's_name2' => ['nullable', 'max:20'],
            'f_name2' => ['nullable', 'max:20'],
            's_ruby2' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            'f_ruby2' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            's_name3' => ['nullable', 'max:20'],
            'f_name3' => ['nullable', 'max:20'],
            's_ruby3' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            'f_ruby3' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20']
        ];
    }
}
