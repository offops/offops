<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterCompanyFormRequest extends Request
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
            'company_name' => 'required|min:4',
            'user_email'   => 'required|email|unique,users',
            'user_name'    => 'required'
        ];
    }
}
