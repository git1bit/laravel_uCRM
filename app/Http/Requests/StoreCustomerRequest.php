<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'm_name' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            'tel1' => ['nullable', 'numeric'],
            'tel2' => ['nullable', 'numeric'],
            'postcode' => ['nullable', 'numeric'],
            'address1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'address2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'temple' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            's_name1' => ['required', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            'f_name1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            's_ruby1' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:50'],
            'f_ruby1' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:50'],
            's_name2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            'f_name2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            's_ruby2' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            'f_ruby2' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            's_name3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            'f_name3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:20'],
            's_ruby3' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            'f_ruby3' => ['nullable', 'regex:/^[ァ-ヾ]+$/u', 'max:20'],
            'grave1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'grave2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'grave3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'grave4' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'grave5' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'grave6' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair4' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair5' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'repair6' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar4' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar5' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'baltar6' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings1' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings2' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings3' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings4' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings5' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'bafittings6' => ['nullable', 'regex:/^[^#<>^;_,.]*$/', 'max:255'],
            'memo' => ['nullable', 'regex:/^[^#<>^;_,.]*$/']
        ];
    }
}
