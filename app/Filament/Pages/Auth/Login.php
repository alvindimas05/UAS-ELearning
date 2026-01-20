<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as PagesLogin;

class Login extends PagesLogin
{
    public function getHeading(): string
    {
        return 'Admin Sign in';
    }
}
