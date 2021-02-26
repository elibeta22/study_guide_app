<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Professor;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationCode;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'login', 'refresh']]);

        $this->middleware('refresh')->only('refresh');
    }


    public function register(RegisterUserRequest $request)
    {

        // Save User Image
        $path = $request->file('image')->store('image', 'public');

        // Generate random code
        $code = mt_rand(100000, 999999);
        error_log($request->user_type_id);

        if($request->user_type_id == 2){

            $user = User::create([
                'user_type_id'=>2,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_able_to_login' => true,
                'image' =>  $path,

                'email_verified_at' => now(),

                'verification_code' => Hash::make($code),
                'remember_token' => str_random(10),
            ]);


            $professor = Professor::create([
                'professor_user_id'=>$user->id,
                'professor_name' => $request->name,
                'school_id'=>$request->school_id,
                'department_id'=>$request->department_id,
            ]);

        }

        if($request->user_type_id == 1){
             $user = User::create([
                'user_type_id'=>1,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_able_to_login' => true,
                'image' =>  $path,

                'email_verified_at' => now(),

                'verification_code' => Hash::make($code),
                'remember_token' => str_random(10),
            ]);

            $student = Student::create([
                'student_user_id'=>$user->id,
                'student_name' => $request->name,
                'school_id'=>$request->school_id,
            ]);

        }


        // Send email to user with verification code
        Mail::to($user->email)->send(new EmailVerificationCode($user, $code));


        if ($token = auth()->attempt(['email' => $user->email, 'password' => $request->password])) {

            return response()->json([
                'token' => $token,
                'user' =>  auth()->user(),
                'message' => 'User Has been created',
                'status' => 'success',
                'code' => 200,
            ], 200);
        }
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);


        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
                'status' => 'error',
                'code' => 401,
            ], 401);
        }

        auth()->user()->load('professors');

        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
            'message' => 'User Login Successfully',
            'status' => 'success',
            'code' => 200,
        ], 200)->withHeaders(['Authorization' => 'Bearer ' . $token]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out',
            'status' => 'success',
            'code' => 200,
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::getToken();

        return response()->json([
            'code' => 200,
            'message' => 'Your token is not expired yet.',
            'status' => 'success'
        ], 200)->withHeaders(['Authorization' => 'Bearer ' . $token]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
