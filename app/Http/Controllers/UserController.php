<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * register function
     *
     * @param RegisterRequest $request which is the rules of register
     * @return void
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            if($this->login($request)){
                $token = $user->createToken('token', [$user->id]);
            }
        }
        $response = [
            'status' => "success",
            'msg' => 'Employee Account Created',
            'data' => $user,
            'token' => $token->plainTextToken,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('welcome',['user'=>$user, 'msg' => 'Employee Account Created']);
        }
    }
    /**
     * login function
     *
     * @param Request $request
     * @return object json for api or redirect to welcome page with the user data
     */
    public function login(Request $request)
    {
        if (!Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            if (request()->expectsJson()) {
                return response()->json(['status' => "fail", 'msg' => 'wrong credentials']);
            }else{
                return redirect()->back()->with('msg','wrong credentials');;
            }
        }
        /** @var \App\Models\User $user **/
        $user = auth('sanctum')->user();
        if ($user->user_type == 'is_admin') {
            $token = $user->createToken('token', ['admin']);
        } else {
            $token = $user->createToken('token', [$user->id]);
        }
        unset($user->password);
        if (request()->expectsJson()) {
            return response()->json(['status' => "success", 'data' => $user, 'token' => $token->plainTextToken]);
        }else{
            return view('welcome',['user'=>$user,'token'=>$token->plainTextToken]);
        }
    }
    /**
     * logout function
     * @var object $user is the current user
     * @return object json for api or redirect to welcome page in web
     */
    public function logout()
    {
        /** @var \App\Models\User $user **/
        $user = auth('sanctum')->user();

        $user->tokens()->delete();
        session()->flush();
        if (request()->expectsJson()) {
            return response()->json(['status' => "success", 'msg' => 'You are logged out']);
        }else{
            return redirect('/')->with('msg','You are logged out');
        }
    }
}
