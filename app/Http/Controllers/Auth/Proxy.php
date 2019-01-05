<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;

class Proxy extends Controller
{
    public function proxy(array $data = [])
    {
        $member = User::where('name', $data['name'])->first();

        if ($member->isEmpty()) {
            return response()->json(['message' => '验证失败', 'code' => IlluminateResponse::HTTP_UNAUTHORIZED]);
        }

    }
}
