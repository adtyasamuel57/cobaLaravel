<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AppController extends Controller
{
    public function input_data($tinggi,$arus,$getaran){

        $current_date_time = Carbon::now()->toDateTimeString();

       // $hasil= hitungfuzzy($tinggi,$arus,$getaran);

        $result = DB::insert('insert into sea (Tgel, Arus, KG,Hasil,Status,created_at) values (?, ?,?,?,?,?)', [$tinggi,$arus,$getaran,15.00,'darurat', $current_date_time]);
        $posts = Http::get("https://tsunami-tsukamoto.herokuapp.com/tsukamoto/3.5/15/500");
        return "ok";
        

    }
    public function data(){
        $posts = Http::get("https://tsunami-tsukamoto.herokuapp.com/tsukamoto/3/8/500");
        $result = DB::table('sea')->select('*')->limit(5)->orderBy('id', 'desc')->get();
        $stat= (json_decode($posts));
        return view('data',['data_sea'=>$result],['data_api'=>$stat]);
    }
}
