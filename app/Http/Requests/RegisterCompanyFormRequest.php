<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use \App\User;

class RegisterCompanyFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // FIXME
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name'         => 'required|min:4',
            'company_workspace_id' => 'required',
            'user_email'           => 'required|email|unique:users,email',
            'user_name'            => 'required|min:2'
        ];
    }

    /**
     * Get the custom validation error messages
     *
     * @return  array
     */
    public function messages()
    {
        // reverse lookup user id by email
        $email = $this->input('user_email');
        $user_id = empty($email) ? null : User::where('email', $email)->pluck('id');

        return [
            'user_email.unique' => sprintf(
                'User email has already been taken. %s',
                \HTML::link(route('users.edit', [$user_id]), 'Edit the user instead?')
            )
        ];
    }
}
