<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use  GuzzleHttp\Client;


class AppController extends Controller
{
    public function input_data($tinggi,$arus,$getaran){

        $current_date_time = Carbon::now()->toDateTimeString();

       // $hasil= hitungfuzzy($tinggi,$arus,$getaran);

        $result = DB::insert('insert into sea (Tgel, Arus, KG,Hasil,Status,created_at) values (?, ?,?,?,?,?)', [$tinggi,$arus,$getaran,15.00,'darurat', $current_date_time]);
        $posts = Http::get("https://tsunami-tsukamoto.herokuapp.com/tsukamoto/3.5/15/500");
        $client = new Client();
        //$response = $client->request('GET', 'https://antares-cse/cin-BspQAuuZQi-lxSf8');
        //$body = $response->getBody();
        //$body_array = json_decode($body);
       // print_r($body_array);
        return "ok";
        

    }
    public function data($waktu){
        $realtime = Carbon::now()->toDateTimeString();

       $posts = Http::get("https://tsunami-tsukamoto.herokuapp.com/tsukamoto/");
        
        if ($waktu == 'semua'){
            $result = DB::table('sea')->select('*')->limit(10)->orderBy('id', 'desc')->get();
        }
        elseif ($waktu == 'harian'){
            $result = DB::table('sea')->whereDay('created_at', '=', date('d'))->select('*')->limit(5)->orderBy('id', 'desc')->get();
        }
        elseif ($waktu == 'bulanan'){
            $result = DB::table('sea')->whereMonth('created_at', '=', date('m'))->select('*')->limit(30)->orderBy('id', 'desc')->get();
        }
      
      
        $stat= (json_decode($posts));

        $temp_gelombang=[];
        $temp_arus=[];
        $temp_getar=[];
        $temp_waktu=[];
        foreach ($result as $key => $value) {
            $temp_gelombang[$key]="'".$value->Tgel."'";
            $temp_arus[$key]=$value->Arus;
            $temp_getar[$key]=$value->KG;
            $temp_waktu[$key]="'".$value->created_at."'";
        }
        $temp_gelombang = implode(',',$temp_gelombang);
        $temp_arus = implode(',',$temp_arus);
        $temp_getar = implode(',',$temp_getar);
        $temp_waktu = implode(',',$temp_waktu);
        
        return view('data',['data_gelombang'=>$temp_gelombang,'data_arus'=>$temp_arus,'data_getar'=>$temp_getar,'data_waktu'=>$temp_waktu,'data_api'=>$stat,'data_sea'=>$result,'data_time'=>$realtime]);
        //return $temp_waktu;
    }
    

}
