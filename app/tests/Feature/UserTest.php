<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testIsValid()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = '1999-01-01';

        $this->assertEquals(true, $user->isValid(), 'Invalid User');
    }

    public function testIsNotValidEmail()
    {
        $user = new User();
        $user->email = "user@technique";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = '1999-01-01';

        $this->assertEquals(false, $user->isValid(), 'Invalid User');
    }

    public function testIsNotValidBirthday()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = '2015-01-01';

        $this->assertEquals(false, $user->isValid(), 'Invalid User');
    }

    public function testIsNotValidFirstname()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = null;
        $user->lastname = "user";
        $user->birthday = '1999-01-01';

        $this->assertEquals(false, $user->isValid(), 'Invalid User');
    }

    public function testIsNotValidLastname()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = null;
        $user->birthday = '1999-01-01';

        $this->assertEquals(false, $user->isValid(), 'Invalid User');
    }

    public function testLoginForm()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testLoginTrue()
    {
        $credential = [
            'email' => 'user@technique.fr',
            'password' => 'password'
        ];
        $this->post('login',$credential)->assertRedirect('/');
    }

    public function testLoginFalse()
    {
        $credential = [
            'email' => 'user@technique.fr',
            'password' => 'incorrectpass'
        ];

        $response = $this->post('login',$credential);

        $response->assertSessionHasErrors();
    }
}
