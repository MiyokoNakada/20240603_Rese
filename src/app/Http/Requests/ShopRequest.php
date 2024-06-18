<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required | string | max:191',
            'area_id' => 'required | integer',
            'genre_id' => 'required | integer',
            'description' => 'string',
            'image' => 'image | mimes:jpg,jpeg,png,gif | max:2048',
        ];
    }
    //エラーメッセージの編集
    public function messages()
    {
        return [
            'name.required' => '店名を入力してください',
            'name.string' => '文字列で入力してください',
            'name.max' => '191字以下で入力してください',
            'area_id.required' => '地域名を選択してください',
            'area_id.integer' => '地域名を選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'genre_id.integer' => 'ジャンルを選択してください',
            'description.string' => '文字列で入力してください',
            'image.image' => '指定されたファイルが画像ではありません',
            'image.mines' => '指定された拡張子(jpg/jpeg/png/gif)ではありません',
            'image.max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
