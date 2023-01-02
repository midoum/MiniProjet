<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


class FileController extends BaseController  {
   function showFile(){
    
    $api=new ApiController();
    $key=$api->enc_key()->key;
    $token=$api->acc_token($key)->access_token;
    $uploads_dir = 'storage/images/';
    $name = $_FILES['user_file']['name']; 
    $file=$_FILES['user_file']['tmp_name'];   
   
    $data=$api->convert($key,$token,$file);
    if($data!=null){
    $text=['text'=>$data->text];
    }else if ($_FILES['user_file']['type']=="text/plain"){
      $content=file_get_contents($file);
      $text=['text'=>$content];
    }
    else{
        $text=['text'=>"Make shure your is a word or text document and not empty"];
    }
    set_time_limit(0);
    $response2=Http::timeout(0)->get('http://192.168.1.12:6060/polls/split?text='.$text['text']);
   
    $lines=json_decode($response2);
    
    $array=[];
    $i=0;
    foreach( $lines as $line ) {
    
    
    array_push($array,[$line->phrase,$line->Score_final]);
     
    }
    return view('welcome')->with(['text'=>$array]);
    
    

  }
  


}

