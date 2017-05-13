<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>

    <title>RAPPI TEST</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }

      .full-height {
        height: 100vh;
      }

      .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
      }

      .position-ref {
        position: relative;
      }

      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }

      .content {
        text-align: center;
      }

      .title {
        font-size: 84px;
      }

      .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
      }

      .m-b-md {
        margin-bottom: 30px;
      }
    </style>
  </head>
  <body>

    <div class="content">
      <div class="title m-b-md">
        Cube Summation 
      </div>

      <div class="content">
        <h3>Hello <span style="color: red">Rappi</span>, you have 2 options for using this app, you can either do it step by step with an interactive way, or you can do it by pasting a big texts with the test cases like in the decription of the problem said it should be. <span style="color: red">My recomendation is to use the interactive one, its more fun.</span></h3>
        <br>
        <a href="{{action('CubeController@index')}}">INTERACTIVE WAY</a>
        <br>
        <br>
        <a href="{{action('StandarCubeController@index')}}">standard way</a>
      </div>
      
  </body>
</html>
