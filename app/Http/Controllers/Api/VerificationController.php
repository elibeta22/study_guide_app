<?php

namespace App\Http\Controllers\Api;

use App\Mail\EmailVerificationCode;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        // Get logged in user
        $user = auth('api')->user();

        // Validate request
        $this->validate($request, [
            'code' => 'required'
        ]);

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Your email is already verified.',
                'code' => 200,
                'status' => 'success',
            ]);
        }

        if (Hash::check($request->code, $user->verification_code)) {
            event(new Verified($user));

            return response()->json([
                'message' => 'Your email has been verified.',
                'code' => 200,
                'status' => 'success',
            ]);
        }
        return response()->json([
            'message' => 'Your code is incorrect',
            'code' => 403,
            'status' => 'error',
        ], 403);
    }

    public function resend(Request $request)
    {
        // Get logged in user
        $user = auth('api')->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Your email is already verified.',
                'code' => 200,
                'status' => 'success'
            ], 200);
        }

        // Generate random code
        $code = mt_rand(100000, 999999);

        $user->verification_code = Hash::make($code);
        // and Save into database
        $user->save();

        // Send email to user with verification code
        Mail::to($user->email)->send(
            new EmailVerificationCode($user, $code)
        );

        return response()->json([
            'message' => 'Verification code has been sent to your email.',
            'code' => 200,
            'status' => 'success'
        ], 200);
    }
}
