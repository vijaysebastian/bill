<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class ProfileRequest extends Request
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
            
            if ($this->segment(1) == 'profile' || $this->segment(1) == 'my-profile') {
                $userid = \Auth::user()->id;
                return [
                    'first_name'      => 'required',
                    'last_name'       => 'required',
                    'company'         => 'required',
                    'mobile'          => 'required|numeric',
                    'mobile_code'     => 'required|numeric',
                    'address'         => 'required',
                    'zip'             => 'required',
                    'user_name'       => 'required|unique:users,user_name,'.$userid,
                    

        ];
            }
        if ($this->segment(1) == 'password' || $this->segment(1) == 'my-password') {
            return [
                    'old_password'     => 'required|min:6',
                    'new_password'     => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
        ];
        }

        if ($this->segment(1) == 'auth') {
            return [
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'email'      => 'required|email|unique:users',
                    'company'    => 'required',
                    'mobile'                => 'required|numeric',
                    'mobile_code'           => 'required|numeric',
                    'user_name'             => 'required|unique:users',
                    'terms'                 => 'accepted',
                    'zip'                   => 'required',
                    'password'              => 'required|min:6',
                    'password_confirmation' => 'required|same:password',
                    'address'               => 'required|max:300',
                    'country'               => 'required|exists:countries,country_code_char2',
                    'bussiness'   => 'required',

        ];
        }
    }

public function messages()
    {
        return[
            'bussiness.required' => 'Choose one Industry',
        ];
    }
}
