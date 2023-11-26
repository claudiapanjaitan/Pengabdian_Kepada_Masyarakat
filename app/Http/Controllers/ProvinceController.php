<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function get_kabupaten(Request $request){

        $provinsi_id = intval($request->prov_id);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:8b9e257a5e4d134dc057a4f7f2ee799b"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
        }
        
        $data = json_decode($response, true);
        for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
            echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
        }
        // $subtotal = $request->subtotal;
        // echo $subtotal;
    }

    function get_kurir(Request $request)
    {
        return view('pages.user.checkout.courier');
    }
    
    function get_kota(Request $request)
    {
        $id_provinsi = $request->id;
        // $data = $this->provinsi_model->get_kota($id_provinsi)->result();
        echo $id_provinsi;
    }
    
    function get_berat(Request $request)
    {
        $id_kota_tujuan = $request->id;
        // $data = $this->provinsi_model->get_berat($id_kota_tujuan)->result();
        echo $id_kota_tujuan;
    }

    function get_biaya(Request $request)
    {
        $id_biaya       = $request->id;
        // $data = $this->provinsi_model->get_biaya($id_biaya)->result();
        echo $id_biaya;
    }

    function get_total(Request $request)
    {
        $id_biaya       = $request->id;
        // $data = $this->provinsi_model->get_biaya($id_biaya)->result();
        echo $id_biaya;
    }
}
