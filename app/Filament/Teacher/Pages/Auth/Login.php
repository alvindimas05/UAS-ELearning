<?php

namespace App\Filament\Teacher\Pages\Auth;

use App\Filament\Pages\Auth\Login as AuthLogin;

class Login extends AuthLogin
{
    public function getHeading(): string
    {
        return 'Teacher Sign in';
    }
}
