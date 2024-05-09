<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Support\Facades\Hash;

class CustomUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        // получаем пароль пользователя из базы данных
        $userPassword = $user->getAuthPassword();        
        // сравниваем введённый пароль с паролем пользователя из базы данных
        return $credentials['password'] === $userPassword;      
       
    }
}
