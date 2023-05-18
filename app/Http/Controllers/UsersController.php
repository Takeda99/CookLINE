<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetCodeMail;


class UsersController extends Controller
{
    //タグのページ移動
    public function index(){
        Auth::logout();
        return view('index');
    }
    public function login1(){
        return view('login1');
    }
    public function login2(){
        return view('login2');
    }
    public function new1(){
        return view('new1');
    }
    public function new2(){
        return view('new2');
    }
    public function admin(){
        return view('top_admin');
    }
    public function admin_list() {
        $users = User::withCount('recipes')->get();
        return view('admin_list', ['users' => $users]);
    }
    public function new_recipe(){
        return view('new_recipe');
    }
    public function top0(){
        return view('top0');
    }public function recipe_update_complete(){
        return view('recipe_update_complete');
    }
    //パスワード再設定
    public function mail1(){
        return view('mail1');
    }
    public function mail1_2(Request $request){
        // フォームの入力メールアドレスを取得
        $email = $request->input('email');
        // 4桁のランダムな数字を生成
        $code = sprintf("%04d", mt_rand(0, 9999));

        // usersテーブルの該当するemailのレコードを取得する
        $user = User::where('email', $email)->first();

        if ($user) {
            // 該当するユーザーが存在する場合はresetカラムに$codeの値を保存して保存処理を行う
            $user->reset = $code;
            $user->save();

            // メール送信
            Mail::to($email)->send(new ResetCodeMail($code));
        }else{
            return view('mail_error');
        }

        return view('mail1_2');
    }
    //パスワード再登録失敗ページ
    public function mail_error(){
        return view('mail_error');
    }
    //パスワード再登録
    public function mail1_3(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password2');
        $password3 = $request->input('password3');

        // emailカラムが一致するユーザーを取得
        $user = User::where('email', $email)->first();
        $password4 = $user->reset;

        if ($user) {
            // resetカラムの値と受け取ったpassword3の値が一致するか確認
            if ($password4 == $password3) {
                if ($password == $password2) {
                    // パスワードをハッシュ化して保存
                    $user->password = Hash::make($password);
                    $user->save();
    
                    return view('mail1_3');
                } else {
                    return view('index');
                    //->with('email', $email)->with('password3', $password3);
                }
            } else {
                return view('index');
                //->with('email', $email)->with('password3', $password3)->with('password4', $password4);
            }
        } else {
            return view('index');//indexのところは変更失敗なので変更失敗ページを作りはじめからやり直させる
        }
    }
    //新規レシピ登録
    public function recipe_complete(Request $request){

        // フォームの入力値を取得
        $menu = $request->input('menu');
        $detail = $request->input('detail');

        // ログインしているユーザーのIDを取得
        $user_id = Auth::id();

        // Recipeモデルを使用して新しいレシピを作成
        $recipe = new Recipe();
        $recipe->menu = $menu;
        $recipe->ingredient = $detail;
        $recipe->user_id = $user_id;
        $recipe->save();

        // 現在の日時を取得
        $now = Carbon::now();

        // Logの作成
        $log = new Log();
        $log->user_id = $user_id;
        $log->action_id = 1;
        $log->time_at = $now;
        $log->save();

        return view('recipe_complete');
    }

    //一般ユーザー新規登録
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        session(['email' => $request->email]);

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return view('/newline', ['email' => $request->email]);
    }

    //管理者ユーザー新規登録
    public function store2(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'admin_password' => 'required|in:h123', // 管理者アカウント作成パスワードの照合
        ]);

        session(['email' => $request->email]);

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = 1;
        $user->save();

        return view('/newadmin');
    }

    //レシピの取得
    public function showRecipes()
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Retrieve all recipes for the user
        $recipes = Recipe::where('user_id', $userId)->get();

        // Pass the recipes to the view
        return view('top0', ['recipes' => $recipes]);
    }

    //レシピの削除
    public function delete($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $recipe->delete();

        $userId = Auth::id();
        $recipes = Recipe::where('user_id', $userId)->get();

        // 現在の日時を取得
        $now = Carbon::now();

        // Logの作成
        $log = new Log();
        $log->user_id = $userId;
        $log->action_id = 3;
        $log->time_at = $now;
        $log->save();

        return view('top0', compact('recipes'));
    }

    //編集するレシピの取得
    public function edit($recipe_id)
    {
        $recipe = Recipe::findOrFail($recipe_id);
        return view('recipe_edit', ['recipe' => $recipe]);
    }

    //編集したレシピを保存
    public function update(Request $request, $recipe_id)
    {
        // データのバリデーションを行います
        $request->validate([
            'menu' => 'required|max:255',
            'ingredient' => 'required',
        ]);

        // idを元にデータベースから該当のレシピを取得します
        $recipe = Recipe::findOrFail($recipe_id);

        // フォームから送信されたデータでレシピを更新します
        $recipe->menu = $request->input('menu');
        $recipe->ingredient = $request->input('ingredient');

        // データベースの更新を行います
        $recipe->save();

        $userId = Auth::id();

        // 現在の日時を取得
        $now = Carbon::now();

        // Logの作成
        $log = new Log();
        $log->user_id = $userId;
        $log->action_id = 2;
        $log->time_at = $now;
        $log->save();

        // 更新後、任意のビューにリダイレクトします
        return view('recipe_edit_complete');
    }

    //ログの取得
    public function admin_log(){
        $logs = Log::with(['user', 'action'])->get();

        return view('admin_log', ['logs' => $logs]);
    }
}
