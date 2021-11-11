<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Parker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member_number' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error.',
                'errors' => $validator->errors()
            ]);
        } else {
            $parker = Parker::where('member_number', $request->member_number)->first();

            if (!$parker || !Hash::check($request->password, $parker->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Login failed. Member number or password is wrong.'
                ]);
            }

            $token = $parker->createToken($parker->log->device_id)->plainTextToken;
            
            $log = Log::where('parker_id', $parker->id)->first();
            $log->time = Carbon::now();
            $log->save();

            return response()->json([
                'status' => true,
                'message' => 'Login success.',
                'parker_id' => $parker->id,
                'token' => $token
            ]);
        }
    }

    public function logout(Parker $parker)
    {
        if ($parker->tokens()->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Logout success.'
            ]);
        }
    }
}
