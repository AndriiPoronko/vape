<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::where('email', $data['email'])->first();
        if($user) return response(['message' => 'User with this email already exists']);

        $user = User::where('phone_number', $data['phone_number'])->first();
        if($user) return response(['message' => 'User with this phone already exists']);

        $user = User::create($data);
        $token = auth()->tokenById($user->id);
        return response(['access_token' => $token]);
    }
}
