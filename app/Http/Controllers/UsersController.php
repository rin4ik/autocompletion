<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    { 
        $users = User::query()
            ->with('company')
            ->search(request('search'))
            ->paginate();

        return view('users', ['users' => $users]);
    } 
    public function search()
    { 
        $users = User::query()
            ->with('company')
            ->search(request('search'))  
            ->take(10)
            ->get();

        return $users;
    } 
}
