<?php

namespace Verdade\Http\Requests;

use Verdade\Http\Requests\Request;

class UserRequest extends Request
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
            'nome' => 'required|min:5',
            'email' => 'required|min:5|email',
            'password' => 'min:8|max:20',
            'tipo' => 'required',
        ];
    }
}
