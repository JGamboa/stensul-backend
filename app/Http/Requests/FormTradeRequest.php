<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormTradeRequest extends FormRequest
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
            'type' => 'string',
            'user_id' => 'integer',
            'symbol' => 'string',
            'shares' => 'integer|between:10,30',
            'price' => 'integer',
            'timestamp' => 'integer'
        ];
    }

    public function getValidatorInstance()
    {

        $data = $this->all();
        $data['timestamp'] = date('Y-m-d H:i:s', $data['timestamp']);

        return parent::getValidatorInstance();
    }
}
