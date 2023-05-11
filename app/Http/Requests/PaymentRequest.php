<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaymentRequest extends Request
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
            'insurance_provider_id' => 'required|integer|exists:insurance_providers,id',
            'payment_date' => 'required',
            'payment_month' => 'required|integer',
            'payment_year' => 'required|integer',
            'total' => 'required|numeric'
        ];

        return $rules;
    }
}
