<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends BaseController {

function enc_key(){
    $response=Http::get('http://192.168.1.12:6060/polls/enc_key');
    $key=json_decode($response);
    
    return $key;

}

function acc_token($key){
    //$key=$request->input('key');
    $response=Http::get('http://192.168.1.12:6060/polls/access_token?key='.$key);
    $acc_token=json_decode($response);
    return $acc_token;

}
function convert($key,$token,$file){
    $response=Http::get('http://192.168.1.12:6060/polls/convert?file='.$file.'&key='.$key.'&token='.$token);
    $data=json_decode($response);
    return $data;
}

}