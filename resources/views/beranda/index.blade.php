@extends('layouts.app')

@section('content')
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
    <noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}" /></noscript>
    <style>
      .wd{
           /* width: 300px; */
           height: 539px;
           background-size: cover;
           opacity: 0.8;
           padding: 55px;
           background-color: black;
       }
       .wd h1{
           text-align: center;
           text-transform: uppercase;
           color:#ffffff;
           font-weight: 300px;
       }
       .wd h4{
           text-align: justify;
           color:#000000;
           font-weight: 100px;
       }
       .wd h2{
           text-align: center;
           text-transform: uppercase;
           font-weight: normal;
           margin: 40px auto;
       }
       .opt form , input[type="button"]{
           background-color: black;
           color:white;
         /* padding:10px;*/
           margin:-14px auto;
           padding-left: 50px;
           padding-right: 50px;
           text-align: center;
           font-size: 16px;
       }
    </style>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div id="wrapper" style="background-color: #e68967;">
        <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="wd col mr-5" style="background-image: url('https://cf.shopee.co.id/file/1ba62ccb74eb7fba743bd13a0f767b49'); border-width: 3px; border-style: solid;border-color: #000000;">
                    <h1>Welcome to Website Fashion</h1>
                    <h4><i>Order good outfits online, 100% quality and safety.</i></h4>
                    <div class="opt"></div>
                </div>
                <div class="wd col mr-5"style="background-image: url('https://id-test-11.slatic.net/original/68ae5dbfe3526ecdffc416065fb751c7.jpg'); border-width: 3px; border-style: solid;border-color: #000000;" >
                    <h1>Welcome to Website Fashion</h1>
                    <h4><i>Order good outfits online, 100% quality and safety.</i></h4>
                    <div class="opt"></div>
                </div>
                <div class="wd col" style="background-image: url('https://cf.shopee.co.id/file/94c6745bc0fa165e562b1133e4952d74'); border-width: 3px; border-style: solid;border-color: #000000;;">
                    <h1>Welcome to Website Fashion</h1>
                    <h4><i>Order good outfits online, 100% quality and safety.</i></h4>
                    <div class="opt"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
@endsection
