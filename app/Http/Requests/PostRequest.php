<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:1',
            'singer' => 'required|min:1',
            'level' => 'required',
        ];
    }

    public function messages(){
        return[
            'title.required' => 'タイトルは必須です',
            'singer.required' => '歌手名は必須です',
            'level.required' => 'ランクを選んでください',
        ];
    }
}
