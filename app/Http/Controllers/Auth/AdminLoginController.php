<?php

namespace App\Http\Controllers\Auth;

use Kreait\Firebase\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Laravel\Firebase\Facades\Firebase;

class AdminLoginController extends Controller
{

    function index() {
        return view('Auth.login');
    }
    public function store(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        try{
            $auth = Firebase::auth();
            $signInResult = $auth->signInWithEmailAndPassword($email,$password);
            return view('users.index');
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ],401);
        }
    }
}
