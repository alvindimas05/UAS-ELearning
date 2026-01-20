<?php

namespace App\Filament\Teacher\Pages\Auth;

use Filament\Auth\Pages\Register as PagesRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class Register extends PagesRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique($this->getUserModel()),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->label(__('Confirm Password'))
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->dehydrated(false),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $data['role'] = 'teacher';
        
        return $this->getUserModel()::create($data);
    }
}
