<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    // User Register
    public function register(Request $request)
    {
        // Validate and create user
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'required' => ':attribute is required.',
            'email' => 'Please provide a valid :attribute.',
            'unique' => 'The :attribute has already been taken.',
            'confirmed' => 'The :attribute confirmation does not match.',
        ], [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Register Validation Error', $validator->messages()->all());
        }

        // return ApiResponse::sendResponse(201, 'User Registered Successfully', $validator);
        $data = $validator->safe()->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $data['token'] = $user->createToken('auth_token_register')->plainTextToken;

        return ApiResponse::sendResponse(201, 'User Registered Successfully', $data);
    }

    public function login(Request $request)
    {
        // Validate and create user
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => ['required'],
        ], [
            'required' => ':attribute is required.',
            'email' => 'Please provide a valid :attribute.',
        ], [
            'email' => 'Email Address',
            'password' => 'Password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Login Validation Error', $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $data['token'] = $user->createToken('auth_token_login')->plainTextToken;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            return ApiResponse::sendResponse(200, 'User Logged In Successfully', $data);
        } else {
            return ApiResponse::sendResponse(401, 'User credentials are invalid', []);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, 'User Logged Out Successfully', []);
    }
}
