<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class FileController extends BaseController
{
   function showFile(){
  $uploads_dir = 'storage/images/';
    $name = $_FILES['user_file']['name']; 
    $file=$_FILES['user_file']['tmp_name'];
    // move_uploaded_file($_FILES['user_file']['tmp_name'],$uploads_dir.$name);
     
    $output = shell_exec("py storage/python/convertdoc.py \"$file\"");
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
    return view('welcome',$text);

  }


}

