<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __invoke(){
        $users = User::all();
        return $users;
    }
}
