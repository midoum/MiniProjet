<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Référencement</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="/storage/custom_css/style.css" rel="stylesheet">       
<!-- Styles -->
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
     

    </head>
    <body class="antialiased">
    @include ('layouts.header')
    
 <div class="file_background">
  <div class="p-5 text-center bg-light">
    
    <form method="POST" action="/file" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
    <label for="formFile" class="form-label">Upload your file</label>
    <input class="form-control" type="file" id="formFile" name="user_file">
    <br>
    <button class="btn btn-primary" type="submit" >Process</button> 
    </div>
    </form><br>
    @if($_SERVER['REQUEST_METHOD'] === 'POST')
    @php
    foreach ($text as $line ){
      echo('<p class="text_ligne" >'.$line[0]."    ".$line[1]. '</p>');
      
    }
    @endphp
    @endif
    <style>
      .text_ligne{
        text-align: justify;
        border-style: groove;
      }
    </style>
  </div>
</div>
    </body>
</html>
