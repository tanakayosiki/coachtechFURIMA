<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostCodeRule;

class AddressUpdateRequest extends FormRequest
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
            'post_code'=>['required',new PostCodeRule()],
            'address'=>['required','max:255']
        ];
    }
    
    public function messages(){
        return[
            'post_code.required'=>'郵便番号を入力してください',
            'address.required'=>'住所を入力してください',
            'address.max'=>'255文字以内で入力してください'
        ];
    }
}
