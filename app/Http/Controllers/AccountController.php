<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function akun(){
        return view('pages.dashboard.main');
    }
    
    public function settings(){
        return view('');
    }

    public function ulos(){
        $list_ulos = Produk::select('produk.*','kategori.id','kategori.kategori_nama')
        ->join('kategori','kategori.id','=','produk.kategori')
        ->where('kategori.kategori_nama','Ulos')
        ->where('produk.status', 1)
        ->get();
        return view('pages.user.ulos',compact('list_ulos'));
    }

    public function profile(Request $request){
        if($request->ajax() ){
            $user = Auth::user();
            return view('pages.dashboard.profile_edit',compact('user'));
        }
        return view('pages.dashboard.profile');
    }
    
    public function editProfile(Request $request, User $profile){
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:150|unique:users,username,' .$profile->id,
            'nama_lengkap' => 'required|max:128',
            'tempat_lahir' => 'required|max:150',
            'tanggal_lahir' => 'required',
            'email' => 'required|max:150|unique:users,email,' .$profile->id,
            'foto' => 'max:6000',
            'alamat' => 'required',
            'kodepos' => 'required|digits_between:4,8',
            'bio' => 'required',
            'notelp' => 'required|min:8|max:20',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else if ($errors->has('nama_lengkap')) {
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
        $profile->username = $request->username;
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

    public function order(Request $request){
        if($request->ajax() ){
            $init = new Orders;
            $orders = $init->get_all_orders();
            return view('pages.dashboard.order_list', compact('orders'));
        }
        return view('pages.dashboard.order');
    }
    
    public function pembayaran(){
        $init = new Orders;
        $flash = session()->flash('payment_flash');
        $payments =  $init->get_all_payments();
        return view('pages.dashboard.pembayaran',compact('payments','flash'));
    }

    public function confirmpayment(){
        
    }

    public function order_view($id){
        $orders = new Orders;
        $orderItem = new OrderItem;
        $data = $orders->order_data($id);
        $items = $orderItem->order_items($id);
        $order['ord'] = $orders->getOrderByInvoice($id);
        $order['product_order'] = $orderItem->getProductByInvoice($id);
        $params['title'] = 'Order #' . $data->order_number;
        $order['data'] = $data;
        $order['produk'] = $data;
        $order['items'] = $items;
        $items = OrderItem::where('order_id',$id)->get();
        $delivery_data = json_decode($data->delivery_data);
        return view('pages.dashboard.detailOrder', compact('data','items','delivery_data'));
    }
}
