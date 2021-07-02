<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
   <style>
   .container {
     background-color: #2d197c;
     height: 100vh;
     width: 100vw;
     position: relative;
     padding: 100px 0;
   }
   .card {
     background-color: #fff;
     width: 50vw;
     padding: 30px;
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     border-radius: 10px;
   }
   .card_title {
     font-weight: bold;
     font-size: 24px;
     margin: 0 0 15px;
   }
   </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1 class="card_title">@yield('title')</h1>
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
   </div>
</body>
</html>