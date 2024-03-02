<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'situation'=>['required'],
            'category'=>['required'],
            'img'=>['required'],
            'name'=>['required'],
            'detail'=>['required'],
            'amount'=>['required','max:7'],
        ];
    }

    public function messages(){
        return[
            'situation.required'=>'入力は必須です',
            'category.required'=>'入力は必須です',
            'img.required'=>'画像を選択してください',
            'name.required'=>'入力は必須です',
            'detail.required'=>'入力は必須です',
            'amount.required'=>'入力は必須です',
            'amount.max'=>'999万9999円以内で入力してください'
        ];
    }
}
