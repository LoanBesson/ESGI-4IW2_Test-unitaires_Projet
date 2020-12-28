<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use App\TodolistItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todolist = TodolistItem::all();

        return view('home', ['todolist' => $todolist]);
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|unique:todolist_items',
            'contentText' => 'required|max:1000',
        ]);

        $item          = new TodolistItem();
        $item->name    = $request->name;
        $item->content = $request->contentText;
        $item->user_id = \Auth::user()->id;

        if (TodolistService::canAddItem($item))
            $item->save();
        else
            return redirect(route('home'))->with('status', 'Ajout impossible');

        return redirect(route('home'));
    }

    public function delete(TodolistItem $item){
        $item->delete();

        return redirect(route('home'))->with('status', 'Item supprimé');
    }

}
