<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PenjualController extends Controller
{
    public function index(){
        return view('');
    }
    
    public function akun(){
        return view('pages.dashboard.main');
    }

    public function login(){
        return view('');
    }

    public function pembayaran(){
        $orders = new Orders;
        $payments = $orders->get_all_payments();
        return view('pages.dashboard.pembayaran', compact('payments'));
    }

    public function editProfile(Request $request, Penjual $profile){
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|max:128',
            'tempat_lahir' => 'required|max:150',
            'tanggal_lahir' => 'required',
            'email' => 'required|max:150|unique:penjual,email,' .$profile->id,
            'foto' => 'max:1000',
            'alamat' => 'required',
            'kodepos' => 'required|digits_between:4,8',
            'bio' => 'required',
            'notelp' => 'required|min:8|max:20',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_lengkap')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_lengkap'),
                ]);
            } else if ($errors->has('tempat_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tempat_lahir'),
                ]);
            } else if ($errors->has('tanggal_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_lahir'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('foto')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('foto'),
                ]);
            } elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            } elseif ($errors->has('kodepos')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kodepos'),
                ]);
            } elseif ($errors->has('bio')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('bio'),
                ]);
            } elseif ($errors->has('notelp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('notelp'),
                ]);
            }
        }
        if($request->password){
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8|max:150',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                if ($errors->has('password')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('password'),
                    ]);
                }
            }
            $profile->password = Hash::make($request->password);
        }
        if (request()->file('foto')) {
            Storage::delete($profile->foto);
            $file = request()->file('foto')->store("user");
            $profile->foto = $file;
        }
        $profile->nama_lengkap = Str::title($request->nama_lengkap);
        $profile->tempat_lahir = Str::title($request->tempat_lahir);
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->email = $request->email;
        $profile->alamat = $request->alamat;
        $profile->kodepos = $request->kodepos;
        $profile->bio = $request->bio;
        $profile->notelp = $request->notelp;
        $profile->active = '1';
        $profile->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profile Berhasil diubah',
        ]);
    }
}
