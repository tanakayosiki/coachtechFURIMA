<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostCodeRule;

class ProfileRequest extends FormRequest
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
            'name'=>['required','max:255'],
            'post_code'=>['required',new PostCodeRule()],
            'address'=>['required','max:255']
        ];
    }

    public function messages(){
        return[
        'name.required'=>'名前を入力してください',
        'name.max'=>'255文字以内で入力してください',
        'post_code.required'=>'郵便番号を入力してください',
        'address.required'=>'住所を入力してください',
        'address.max'=>'255文字以内で入力してください'
        ];
    }
}
