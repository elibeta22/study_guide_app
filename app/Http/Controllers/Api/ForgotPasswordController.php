<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetCodeEmail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordChanged;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        // verify if email is exist in database
        $validateEmail = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validateEmail->fails()) {
            return response()->json([
                'message' => $validateEmail->errors()->first(),
                'code' => 422,
                'status' => 'error'
            ], 422);
        }

        $code = mt_rand(100000, 999999);

        $isRecordExists = \DB::table('password_resets')->where('email', $request->email)->exists();

        if ($isRecordExists) {
            \DB::table('password_resets')
                ->where('email', $request->email)
                ->update([
                    'token' => Hash::make($code),
                ]);
        } else {
            \DB::table('password_resets')
                ->insert([
                    'email' => $request->email,
                    'token' => Hash::make($code),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
        }

        Mail::to($request->email)->send(
            new PasswordResetCodeEmail($code)
        );

        return response()->json([
            'message' => "We 've sent you verification code in your email address.",
            'code' => 200,
            'status' => 'success'
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $validateUserData =  Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required',
            'password' => 'required'
        ]);

        if ($validateUserData->fails()) {
            return response()->json([
                'message' => $validateUserData->errors()->first(),
                'code' => 422,
                'status' => 'error'
            ], 422)->withHeaders(['Authorization' => '']);
        }

        if ($this->isVerifyCode($request)) {

            // delete existing code from database
            \DB::table('password_resets')
                ->where('email', $request->email)
                ->delete();

            // reset password
            $user = \App\User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            // send email to user about changing password
            Mail::to($user->email)->send(
                new PasswordChanged($user)
            );

            return response()->json([
                'message' => 'Your password has been changed.',
                'code' => 200,
                'status' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'Verification code is not correct',
            'code' => 401,
            'status' => 'error'
        ], 401);
    }

    public function isVerifyCode(Request $request)
    {
        // Get store code in database against user specified email
        $code = \DB::table('password_resets')
            ->where('email', $request->email)
            ->pluck('token')
            ->first();

        return Hash::check($request->code, $code);
    }
}
