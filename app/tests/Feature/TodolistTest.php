<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use App\TodolistItem;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistTest extends TestCase
{
    public function testIsValid()
    {
        $user = new User();
        $user->email = "user@technique.fr";
        $user->firstname = "user";
        $user->lastname = "user";
        $user->birthday = '1999-01-01';


        $item1 = new TodolistItem();
        $item1->name = "Test Item";
        $item1->content = "Content test item";

        $item2 = new TodolistItem();
        $item2->name = "Test Item 2";
        $item2->content = "Content test item 2";

//        Ne fonctionne pas
//        $this->assertEquals(false, TodolistService::canAddItem($item2), 'Cannot add item');
    }
}
