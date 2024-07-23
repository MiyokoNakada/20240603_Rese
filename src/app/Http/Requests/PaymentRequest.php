<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'amount' => 'required | integer | min:1',
        ];
    }

    //エラーメッセージの編集
    public function messages()
    {
        return [
            'amount.required' => '金額を入力してください',
            'amount.integer' => '整数値を入力してください',
            'amount.min' => '1円以上で入力してください',
        ];
    }
}
