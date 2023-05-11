<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProtocolRequest extends Request
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
        $rules = [
            'name' => 'required|min:3|max:250',
            'instructions' => 'required',
        ];

        // Editing
        if ($this->input('_method') == 'PATCH')
        {
            $rules['is_active'] = 'required|in:1,0';
        }

        return $rules;
    }
}
