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
    $response2=Http::timeout(0)->get('http://192.168.1.12:6060/polls/split?text='.$text['text'].'&key='.$key.'&token='.$token);
   
    $lines=json_decode($response2);
    
    $array=[];
    $i=0;
    foreach( $lines as $line ) {
    
    
    array_push($array,[$line->phrase,$line->Score_final]);
     
    }
  function sort_array($array){
      for ($j=0;$j<count($array);$j++){
       for ($i=0;$i<count($array)-1;$i++){
            $x=[];
            $first=intval($array[$i][1]);
            $in=$i+1;
            $second=intval($array[$in][1]);
            if($first<$second){
              
              $x=$array[$i];
              $array[$i]=$array[$in];
              $array[$in]=$x;
            }
            
       }
      }
       return $array;
      }
    function cut_array($array){
      $value=[];
      if(count($array)>=5){
      for ($i=0;$i<5;$i++){
        array_push($value,$array[$i]);
      }
    }else{
      $value=$array;
    }
    return $value;
    }
    
    $array=sort_array($array);
    $array=cut_array($array);
    $T="" ;
    for ($i=0;$i<count($array);$i++){
      $T=$T." ".$array[$i][0];
    }
    
    $response3=Http::timeout(0)->get('http://192.168.1.12:6060/polls/generate_title?text='.$T.'&key='.$key.'&token='.$token);
    $Title=json_decode($response3);
    $response4=Http::timeout(0)->get('http://192.168.1.12:6060/polls/generate_description?text='.$T.'&key='.$key.'&token='.$token);
    $description=json_decode($response4);
    
    $ai_data=['titre'=>$Title->title,'description'=>$description->title];
  
    return view('welcome')->with(['text'=>$array,'data'=>$ai_data]);
    
    

  }
 




}


