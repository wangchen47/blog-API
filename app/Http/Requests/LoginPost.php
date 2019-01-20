<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
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
          'name'    => 'required',
          'password' => 'required',
        ];
    }

    public function messages()
    {
      return [
        'required' => ':attribute不能为空',
        ];
    }

    public function attributes()
    {
      return [
        'name' => '用户名',
        'password' => '密码',
      ];
    }
}
