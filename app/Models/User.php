<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'Users'; // Указываем имя таблицы

    protected $primaryKey = 'UserID'; // Указываем первичный ключ

    protected $fillable = ['Login', 'Password', 'Role'];
    
    protected $hidden = [
        'password',       
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function findForAuth(array $credentials)
    {
        return $this->where('login', $credentials['login'])->first();
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'document_user', 'user_id', 'document_id');
    }
    public function getAuthPassword()
    {
        return $this->Password; 
    }
    
}