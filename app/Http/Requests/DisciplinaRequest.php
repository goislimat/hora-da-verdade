<?php

namespace Verdade\Http\Requests;

use Verdade\Http\Requests\Request;

class DisciplinaRequest extends Request
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
            'semestre' => 'required|numeric',
            'curso_id' => 'required',
        ];
    }
}
