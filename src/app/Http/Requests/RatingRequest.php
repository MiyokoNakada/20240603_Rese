<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'rating' => 'required',
            'comment' => 'nullable| string | max:255',
        ];
    }

    //エラーメッセージの編集
    public function messages()
    {
        return [
            'rating.required' => '評価を選択してください',
            'comment.string' => '文字列で入力してください',
            'comment.max' => '255字以下で入力してください',
        ];
    }
}
