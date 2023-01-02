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
    <button class="btn btn-primary btn-block mb-4" type="submit" name="proc" >Process</button> 

    </div>
    </form><br>
    @php
    
    @endphp
    @if($_SERVER['REQUEST_METHOD'] === 'POST')
    @php
    
    foreach ($text as $line ){
      echo(' <div class="card" >
           
           <div class="card-body ">
             <h5 class="card-title ">
               <span >Titre : '.$line[0].'</span>
             </h5>
             <p class="card-text ">
               <span > Score : '.$line[1].'</span>
               
             </p>
            
           </div>
         </div>');
      
    }
   
    echo('<input type="text"  width="80%"class="form-control" value="'.$data['titre'].'" id="titre"><button onclick="myFunction(\'titre\')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg></button><br>
        <input type="text" width="80%" class="form-control" value="'.$data['description'].'" id="description"><button onclick="myFunction(\'description\')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg></button> <br>
        <script>
                function myFunction(target) {
            // Get the text field
            var copyText = document.getElementById(target);
    
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
    
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
    
            // Alert the copied text
            
          }
        </script>
    ');
    
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
