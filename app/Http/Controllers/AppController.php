<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use  GuzzleHttp\Client;


class AppController extends Controller
{
    public function input_data()
    {
            // Antares
        $headers = [
            'Content-Type' => 'application/json',
            'X-M2M-Origin' => '935a0ba3ee50ed9c:c835eedd1ff34101',
        ];
        $client = new Client([
            'headers' => $headers
        ]);
        $response = $client->request('GET', 'https://platform.antares.id:8443/~/antares-cse/antares-id/NamiPostman/simulasiNami/la');
        $body = $response->getBody();
        $body_array = json_decode($body, true);
        $time = $body_array['m2m:cin']['ct'];
        $data = $body_array['m2m:cin']['con'];
        $data =  json_decode($data);

        $result = DB::insert('insert into sea (Tgel, Arus, KG,created_at) values (?, ?,?,?)', [$data->tg,$data->ka,$data->kg, $time]);
      if ($result){
          echo "Input Data Berhasil";
            }  

            // Thinkspeak version 
            // $headers = [
            //             'Content-Type' => 'application/json',
            //             'Accept: application/json',
            //         ];
            //         $client = new Client([
            //             'headers' => $headers
            //         ]);
            //         $response = $client->request('GET', 'https://api.thingspeak.com/channels/1458704/feeds.json?api_key=4BPF4WVINA2I8GKG&results=2');
            //         $body = $response->getBody();
            //         $body_array = json_decode($body, true);
            //         // dd($body_array);
            //         $data = $body_array['feeds'][0];
            //         $data = json_encode($data,JSON_NUMERIC_CHECK);
            //         $data =  json_decode($data,true);
            //         // dd($data);
            //         $dtinggi = $data['field1'];
            //         $daruss = $data['field2'];
            //         $dgempa = $data['field3'];
            //         // $dtime = $data['created_at'];
            //         $result = DB::insert('insert into sea (Tgel, Arus, KG) values (?, ?,?)', [$dtinggi,$daruss,$dgempa]);
            //     if ($result){
            //         echo "Input Data Berhasil";
            //             }  
            


    }
    public function data($waktu)
    {
        date_default_timezone_set('Asia/Jakarta');
        $realtime = date('Y-m-d H:i:s');


        $posts = Http::get("https://tsunami-tsukamoto.herokuapp.com/tsukamoto/");

        if ($waktu == 'semua') {
            $result = DB::table('sea')->select('*')->limit(50)->orderBy('id', 'desc')->get();
        } elseif ($waktu == 'harian') {
            $result = DB::table('sea')->whereDate('created_at', '=', date('Y-m-d'))->select('*')->limit(24)->orderBy('id','desc')->get();
        } elseif ($waktu == 'bulanan') {
            $result = DB::table('sea')->whereMonth('created_at', '=', date('m'))->select('*')->limit(30)->orderBy('id', 'desc')->get();
        }


        //$stat = (json_decode($posts[1]));
        $heroku= (json_decode($posts));
        $status = $heroku[0];
        $tinggi = $heroku[1];
        $ntinggi= $heroku[2];
        $arus = $heroku[3];
        $narus = $heroku[4];
        $getar =$heroku[5];
        $ngetar=$heroku[6];

        $temp_gelombang = [];
        $temp_arus = [];
        $temp_getar = [];
        $temp_waktu = [];
        foreach ($result as $key => $value) {
            $temp_gelombang[$key] = "'" . $value->Tgel . "'";
            $temp_arus[$key] = $value->Arus;
            $temp_getar[$key] = $value->KG;
            $temp_waktu[$key] = "'" . $value->created_at . "'";
        }
        $temp_gelombang = implode(',', $temp_gelombang);
        $temp_arus = implode(',', $temp_arus);
        $temp_getar = implode(',', $temp_getar);
        $temp_waktu = implode(',', $temp_waktu);

        return view('data', ['data_gelombang' => $temp_gelombang, 'data_arus' => $temp_arus, 'data_getar' => $temp_getar, 'data_waktu' => $temp_waktu, 'data_api' => $status, 'data_sea' => $result, 'data_time' => $realtime,'datapi_tinggi'=>$tinggi,'datapi_arus'=>$arus,'datapi_getar'=>$getar,'nilai_tinggi'=>$ntinggi,'nilai_arus'=>$narus,'nilai_getar'=>$ngetar]);
    }
}
