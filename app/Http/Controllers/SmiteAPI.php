<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Response;
use DateTime;
use DateTimeZone;

class SmiteAPI extends Controller
{
    public function motd(){
        
        $session_id="";
        
        if(!Cache::has('session')){
            $hash = env('SMITE_DEVID')."createsession".env('SMITE_AUTH').gmdate("YmdHis");
            $sign = (string)md5($hash);
            $response = json_decode(Http::get(
                "http://api.smitegame.com/smiteapi.svc/createsessionJson/".env('SMITE_DEVID')."/".$sign."/".gmdate("YmdHis")
            ));
            $session_id = $response->session_id;
            Cache::put('session', $session_id, now()->addMinutes(15)); // sessions are dsigned by Hirez to last only 15 minutes 
            
        }
        else{
            $session_id = Cache::get('session');
        }

        $hash = env('SMITE_DEVID')."getmotd".env('SMITE_AUTH').gmdate("YmdHis");
        $signature1=(string)md5($hash);
        
        $motd = json_decode(Http::get(
            "http://api.smitegame.com/smiteapi.svc/getmotdJson/".env('SMITE_DEVID')."/".$signature1."/".$session_id."/".gmdate("YmdHis")
        ));


        $hash = env('SMITE_DEVID')."gethirezserverstatus".env('SMITE_AUTH').gmdate("YmdHis");
        $signature2=(string)md5($hash);
        $patch_json =  json_decode(Http::get(
            "http://api.smitegame.com/smiteapi.svc/gethirezserverstatusJson/".env('SMITE_DEVID')."/".$signature2."/".$session_id."/".gmdate("YmdHis")
        ));

        $match_index = -1;
        if(!Cache::has('date_index')){
            $date = new DateTime("now", new DateTimeZone('PST'));
            $date = $date->format('n/j/Y');
            $today = (string)$date;
            for ($i = 0; $i < count($motd); $i++) {
                $match_date = explode(" ",$motd[$i]->startDateTime); 
                if($today === $match_date[0]){
                
                    Cache::put('date_index', $i, now()->addMinutes(30));
                    $match_index = $i;
                    break;
                }
            }
        }
        else{
            $match_index = Cache::get('date_index');
        }

        return view('landing.home', [
            'motd' => $motd[$match_index],
            'servers' => $patch_json,
        ]);

        
    }

    public function check(){
        $session_id="";
        
        if(!Cache::has('session')){
            $hash = env('SMITE_DEVID')."createsession".env('SMITE_AUTH').gmdate("YmdHis");
            $sign = (string)md5($hash);
            $response = json_decode(Http::get(
                "http://api.smitegame.com/smiteapi.svc/createsessionJson/".env('SMITE_DEVID')."/".$sign."/".gmdate("YmdHis")
            ));
            $session_id = $response->session_id;
            Cache::put('session', $session_id, now()->addMinutes(15)); // sessions are dsigned by Hirez to last only 15 minutes 
            
        }
        else{
            $session_id = Cache::get('session');
        }

        $hash = env('SMITE_DEVID')."getdataused".env('SMITE_AUTH').gmdate("YmdHis");
        $signature1=(string)md5($hash);
        
        $data = Http::get(
            "http://api.smitegame.com/smiteapi.svc/getdatausedJson/".env('SMITE_DEVID')."/".$signature1."/".$session_id."/".gmdate("YmdHis")
        );

        $hash = env('SMITE_DEVID')."getmotd".env('SMITE_AUTH').gmdate("YmdHis");
        $signature1=(string)md5($hash);
        
        $motd =Http::get(
            "http://api.smitegame.com/smiteapi.svc/getmotdJson/".env('SMITE_DEVID')."/".$signature1."/".$session_id."/".gmdate("YmdHis")
        );

        

        return view('admin.check', [
            'check' => json_decode($data),
            'motd' => $motd
        ]);
    }
}
