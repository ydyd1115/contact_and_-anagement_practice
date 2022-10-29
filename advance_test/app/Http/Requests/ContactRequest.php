<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ContactRequest extends FormRequest
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
            'family_name'=>'required|string',
            'first_name'=>'required|string',
            'email'=>'required|email',
            'postcode'=> ['required', new ZipCodeRule()],
            'address'=>'required|string',
            'opinion'=>'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'family_name.required' => 'お名前(姓)を入力してください',
            'first_name.required' => 'お名前(名)を入力してください',
            'role.required' => '役職を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => 'ご意見は120文字以内でご入力ください',
        ];
    }
}
