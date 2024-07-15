<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'date' => 'required | date | after:today ',
            'time' => 'required ',
            'people_number' => 'required | integer | min:1',
        ];
    }

    //エラーメッセージの編集
    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '日付形式で入力してください',
            'date.after' => '明日以降の日付を選択してください',
            'time.required' => '時間を入力してください',
            'people_number.required' => '人数を入力してください',
            'people_number.integer' => '整数値を入力してください',
            'people_number.min' => '1人以上で選択してください',
        ];
    }
}
