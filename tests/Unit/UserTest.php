<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test user creation.
     */
    public function test_user_creation()
    {
        
        $user = User::create([
            'Login' => 'test_user',
            'Password' => 'password',
            'Role' => 'user',
        ]);
        
        $this->assertNotNull($user);
        
        $this->assertEquals('test_user', $user->Login);
        $this->assertEquals('user', $user->Role);
    }
}
