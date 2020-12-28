<?php

namespace App\Services;

use App\TodolistItem;
use App\Services\TodolistService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistService
{
    public static function canAddItem(TodolistItem $item)
    {
        $items = User::find(Auth::user()->getAuthIdentifier())->todolist;

        $last = TodolistItem::where('user_id', '=', Auth::user()->getAuthIdentifier())->orderBy('created_at', 'desc')->first();

        return count($items) == 0 || (count($items) < 10) && (time() >= strtotime('+30 minutes', strtotime($last->created_at)));
    }
}
