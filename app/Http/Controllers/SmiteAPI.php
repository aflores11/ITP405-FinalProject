<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Response;

class SmiteAPI extends Controller
{
    public function motd(){
        
        $session_id="";
        $signature="";
        
        if(!Cache::has('session')){
            print("create");
            $hash = env('SMITE_DEVID')."createsession".env('SMITE_AUTH').gmdate("YmdHis");
            $sign = (string)md5($hash);
            $response = json_decode(Http::get(
                "http://api.smitegame.com/smiteapi.svc/createsessionJson/".env('SMITE_DEVID')."/".$sign."/".gmdate("YmdHis")
            ));
            $session_id = $response->session_id;
            Cache::put('session', $session_id, now()->addMinutes(15));
            
        }
        else{
            $session_id = Cache::get('session');
        }

        $hash = env('SMITE_DEVID')."getmotd".env('SMITE_AUTH').gmdate("YmdHis");
        $signature1=(string)md5($hash);
        
        $motd_json = json_decode( Http::get(
            "http://api.smitegame.com/smiteapi.svc/getmotdJson/".env('SMITE_DEVID')."/".$signature1."/".$session_id."/".gmdate("YmdHis")
        ));

        $hash = env('SMITE_DEVID')."gethirezserverstatus".env('SMITE_AUTH').gmdate("YmdHis");
        $signature2=(string)md5($hash);
        $patch_json =  json_decode(Http::get(
            "http://api.smitegame.com/smiteapi.svc/gethirezserverstatusJson/".env('SMITE_DEVID')."/".$signature2."/".$session_id."/".gmdate("YmdHis")
        ));
        return view('landing.home', [
            'motd' => $motd_json[4],
            'servers' => $patch_json
        ]);

        
    }
}
