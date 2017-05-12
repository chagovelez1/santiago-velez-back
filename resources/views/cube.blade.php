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

      @if (session('message'))
      <h1 style="color:red">
        {{ session('message') }}
      </h1>
      @endif
     
      @if (count($errors) > 0)
      <div style=" color: orangered">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


      <div style="text-align: left;">
        <form method="POST" action="/cube/create" >
          {{ csrf_field() }}
          <h3>Create new matrix</h3>
          size:
          <input type="number" required="" name="size">
          <input value="create new matrix" type="submit">
        </form>
      </div>

      @if(Session::has('matrix'))
      <br>
      <br>
      <hr>      
      <form method="POST" action="{{action('CubeController@update')}}">
        {{ csrf_field() }}
        <table>
          <thead>
            <tr>
              <th>POSTION</th>
              <th>UPDATE</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                X
              </td>
              <td>
                <input name="x" type="number" min="1" max="{{Session::get('N')}}">
              </td>
            </tr>
            <tr>
              <td>
                Y
              </td>
              <td>
                <input name="y" type="number" min="1" max="{{Session::get('N')}}">
              </td>
            </tr>
            <tr>
              <td>
                Z
              </td>
              <td>
                <input name="z" type="number" min="1" max="{{Session::get('N')}}">
              </td>
            </tr>
            <tr>
              <td>
                value
              </td>
              <td>
                <input name="val" type="number" min="-1000000000" max="1000000000">
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input value="update" type="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>

      <br>
      <br>
      <hr>

      <form method="POST" action="{{action('CubeController@query')}}">
        {{ csrf_field() }}
        <table>
          <thead>
            <tr>
              <th>POSTION</th>
              <th>Query</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                X1
              </td>
              <td>
                <input name="x1">
              </td>
            </tr>
            <tr>
              <td>
                Y1
              </td>
              <td>
                <input name="y1">
              </td>
            </tr>
            <tr>
              <td>
                Z1
              </td>
              <td>
                <input name="z1">
              </td>
            </tr>
            <tr>
              <td>
                X2
              </td>
              <td>
                <input name="x2">
              </td>
            </tr>
            <tr>
              <td>
                Y2
              </td>
              <td>
                <input name="y2">
              </td>
            </tr>
            <tr>
              <td>
                Z2
              </td>
              <td>
                <input name="z2">
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input value="query" type="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>

      <hr>

      @endif



      </body>
      </html>
