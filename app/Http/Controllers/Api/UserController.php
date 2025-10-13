<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;



class UserController extends Controller
{
    public function userInfo(Request $request)
    {
        $user = auth()->user()->load('posts');
        if (!$user) {
            return ApiResponse::sendResponse(204, 'cannot find user', null);
        }
        return ApiResponse::sendResponse(200, 'User Info Retrieved Successfully', new UserResource($user));
    }
}
