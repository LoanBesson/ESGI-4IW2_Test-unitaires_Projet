<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use App\TodolistItem;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class TodolistTest extends TestCase
{
    public function testIsValid()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = strtotime('-20 years', now()->getTimestamp());


        $item1 = new TodolistItem();
        $item1->name = "Test Item";
        $item1->content = "Content test item";

        $item2 = new TodolistItem();
        $item2->name = "Test Item 2";
        $item2->content = "Content test item 2";

//        $this->assertFalse(TodolistService::canAddItem($item2), 'Cannot add item');
    }

//    public function testmail()
//    {
//        $mock = Mockery::mock('Swift_Mailer');
//        $this->app['mailer']->setSwiftMailer($mock);
//        $mock->shouldReceive('send')->once()
//            ->andReturnUsing(function($msg) {
//                $this->assertEquals('test', $msg->getSubject());
//                $this->assertEquals('test@bar.com', $msg->getTo());
//                $this->assertContains('quelque chose de teste', $msg->getBody());
//            });
//    }
}
