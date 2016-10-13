<?php

namespace App\Http\Requests;

use App\Traits\Http\Forbidden;

use Illuminate\Contracts\Auth\Factory;

class UserRequest extends Request
{
    use Forbidden;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return bool
     */
    public function authorize(Factory $auth)
    {
        return $auth->user()->isAdministrator() || ($this->user && $auth->id() == $this->user->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,:id',
            'password' => 'required_without:id|min:6|confirmed',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'password' => 'senha',
        ];
    }
}
