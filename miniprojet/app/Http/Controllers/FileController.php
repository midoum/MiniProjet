<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class FileController extends BaseController
{
   function showFile(){
  $uploads_dir = 'storage/images/';
    $name = $_FILES['user_file']['name']; 
    $file=$_FILES['user_file']['tmp_name'];
    // move_uploaded_file($_FILES['user_file']['tmp_name'],$uploads_dir.$name);
     
    $output = Http::get('http://192.168.1.11:6060/polls/convert?file='.$file);
    $data=json_decode($output);
    if($data!=null){
    $text=['text'=>$data->text];
    }else if ($_FILES['user_file']['type']=="text/plain"){
      $content=file_get_contents($file);
      $text=['text'=>$content];
    }
    else{
        $text=['text'=>"Make shure your word document contains only text"];
    }
    $response2=Http::get('http://192.168.1.11:6060/polls/split?text='.$text['text']);
    $lines=json_decode($response2);
    $i=1;
    $array=[];
    foreach( $lines as $line ) {
      array_push($array,$line->$i);
      $i++;
    }
    
    return view('welcome')->with('text',$array);

  }
  


}

