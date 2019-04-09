<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|string',
            'intro' => 'required|string',
            'content' => 'required|string',
            'tech_category_id' => 'required|number' ,
            'label' => 'required|string'
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
      return  [
          'title' => '标题',
          'intro' => '简介',
          'content' => '内容',
          'techCategory' => '分类',
          'label' => '标签'
      ];
    }
}
