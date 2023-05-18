<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleLineCallback()
    {
        try {
            $user = Socialite::driver('line')->user();
        } catch (\Exception $e) {
            return redirect('/login1'); // もしエラーがあれば、ログインページにリダイレクトします。
        }

        $line = $user->getId();

        $email = session('email');
        
        session(['line_id' => $line]);
        $line_user_id = session('line_id');

        // Find user by email
        $lineUser = User::where('email', $email)->first();

        if ($lineUser) {
            // Update line_user_id
            $lineUser->line_user_id = $line_user_id;
            $lineUser->save();
        }

        // セッションを削除します
        session()->flush();
        
        // ユーザーを認証します。
        Auth::login($lineUser, true);

        // ログイン後のリダイレクト先を設定します。
        return view('/top1');
    }

    //ログイン一般
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['admin'] = 0; // adminカラムの値が0の条件を追加

        if (Auth::attempt($credentials)) {
            // Authentication was successful...
            return redirect('/top0');
        }

        // If unauthenticated, redirect back with an error message.
        return back()->withErrors([
            'email' => 'mailかpasswordに間違いがあります',
        ]);
    }
    //ログイン管理者
    public function authenticate2(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['admin'] = 1; // adminカラムの値が1の条件を追加

        if (Auth::attempt($credentials)) {
            // Authentication was successful...
            return redirect('/top_admin');
        }

        // If unauthenticated, redirect back with an error message.
        return back()->withErrors([
            'email' => 'mailかpasswordに間違いがあります',
        ]);
    }


    //ログアウト
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Redirect to index page after logout
    }

    public function showLoginForm()
    {
        return view('index');
    }



}
