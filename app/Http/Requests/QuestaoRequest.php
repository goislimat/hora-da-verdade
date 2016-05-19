<?php

namespace Verdade\Http\Requests;

use Verdade\Http\Requests\Request;

class QuestaoRequest extends Request
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
            'prova_id' => 'required',
            'pergunta' => 'required|min:5',
            'ordem' => 'required|number',
            'tipo' => 'required',
            'peso' => 'number',
        ];
    }
}
