<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'provider_id' => 'required|integer|exists:insurance_providers,id',
            'practice_id' => 'required|integer|exists:practices,id',
            'order_date' => 'required',
            'period_month' => 'required|integer',
            'period_year' => 'required|integer',
            'quantity' => 'required|integer',
            'total' => 'required|numeric'
        ];

        // Editing
        if ($this->input('_method') == 'PATCH')
        {
            $rules['paid'] = 'required|in:1,0';
        }

        return $rules;
    }
}
