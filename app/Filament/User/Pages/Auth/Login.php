<?php

namespace App\Filament\User\Pages\Auth;

use App\Filament\Pages\Auth\Login as AuthLogin;

class Login extends AuthLogin
{
    public function getHeading(): string
    {
        return 'User Sign in';
    }
}
