<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\Admin;
use App\Models\Penjual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(){
        return view('pages.auth.main');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = User::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::user()->username,
                        'callback' => route('home'), 
                    ]);
            } else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'password salah', 
                ]);
            }
        } else{
            return response()->json([
            'alert' => 'error',
            'message' => 'Email tidak ditemukan.',
            ]);
        }
    }

    public function reset($token){
        return view('pages.auth.reset', compact('token'));
    }

    public function logout(){
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('home');
    }

    public function forgot(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::to($request->email)->send(new ResetMail($token));
        return response()->json([
            'alert' => 'success',
            'message' => 'Mohon cek email untuk reset password anda',
            'callback' => route('auth.index'),
        ]);
    }
    
    public function do_reset(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:255',
            'cpassword' => 'required|min:8|max:255|same:password',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else if ($errors->has('cpassword')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cpassword'),
                ]);
            }
        }

        $updatePassword = DB::table('password_resets')
        ->where(['token' => $request->token])
        ->first();
        if (!$updatePassword) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Invalid token!',
            ]);
        }
        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Password berhasil di ubah',
            'callback' => route('auth.index'),
        ]);
    }

    public function penjualIndex(){
        return view('pages.penjual.auth.main');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } else if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else if ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }else if ($errors->has('password_confirm')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password_confirm'),
                ]);
            }else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil Daftar',
            'callback' => route('auth.index'),
        ]);
    }

    public function PenjualLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = Penjual::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::guard('penjual')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::guard('penjual')->user()->nama,
                        'callback' => route('home'), 
                    ]);
            } else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'password salah', 
                ]);
            }
        } else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Email tidak ditemukan.',
            ]);
        }
    }

    public function penjualLogout(){
        $user = Auth::guard('penjual')->user();
        Auth::guard('penjual')->logout($user);
        return redirect()->route('penjual.login');
    }
    
    public function adminIndex(){
        return view('pages.admin.auth.main');
    }

    public function adminLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = Admin::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::guard('admin')->user()->nama,
                        'callback' => route('admin.index'), 
                    ]);
            } else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'password salah', 
                ]);
            }
        } else{
            return response()->json([
            'alert' => 'error',
            'message' => 'Email tidak ditemukan.',
            ]);
        }
    }

    public function adminLogout(){
        $user = Auth::guard('admin')->user();
        Auth::guard('admin')->logout($user);
        return redirect()->route('login');
    }
}
