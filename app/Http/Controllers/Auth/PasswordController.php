<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Rota para redirecionar o usuário após resetar a senha
     * de acesso com sucesso.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Assunto do email enviado para resetar a senha de
     * acesso do usuário.
     *
     * @var string
     */
    protected $subject = 'Link para resetar sua senha';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }
}
