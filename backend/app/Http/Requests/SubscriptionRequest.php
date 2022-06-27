<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'email' => 'required|email:dns|unique:subscriptions',
            'name' => 'required|string',
            'fields' => 'array',
            'fields.*.field_id' => 'required|integer',
            'fields.*.value' => 'required'
        ];
    }
}
