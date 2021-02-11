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
        $user->birthday = strtotime('-20 years', now()->getTimestamp());

        $this->assertTrue($user->isValid(), 'Valid User');
    }

    public function testIsNotValidEmail()
    {
        $user = new User();
        $user->email = "user@technique";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = strtotime('-20 years', now()->getTimestamp());

        $this->assertFalse($user->isValid(), 'Invalid User');
    }

    public function testIsNotValidBirthday()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = strtotime('-5 years', now()->getTimestamp());

        $this->assertFalse(false, $user->isValid(), 'Invalid User');
    }

    public function testIsNotValidFirstname()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = null;
        $user->lastname = "user";
        $user->birthday = strtotime('-20 years', now()->getTimestamp());

        $this->assertFalse($user->isValid(), 'Invalid User');
    }

    public function testIsNotValidLastname()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = null;
        $user->birthday = strtotime('-20 years', now()->getTimestamp());

        $this->assertEquals(false, $user->isValid(), 'Invalid User');
    }

    public function testRootPath()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testLoginForm()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
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

//    public function testMock()
//    {
//        $obj = $this->createMock(User::class);
//
//        $obj->expects($this->any())
//            ->method('doSomething')
//            ->will($this->returnValue(42));
//    }

//    public function testCreateUser()
//    {
//        $name = ’Fendly’;
//
//        $this->post(’users’, [’name’ => $name])
//            ->assertSuccessful();
//
//        $this->assertEquals(
//            $name,
//            User::latest()->first()->name
//        );
//    }
}
