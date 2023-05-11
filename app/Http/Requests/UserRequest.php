<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
        $rules  = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];

        // Editing
        if ($this->input('_method') == 'PATCH')
        {
            $rules['username'] = $rules['username']  . ',id,'. $this->id;
            $rules['email'] = $rules['email'] . ',id,' . $this->id;

            unset($rules['password']);
            $rules['is_active'] = 'required|in:1,0';
        }

        return $rules;
    }
}
