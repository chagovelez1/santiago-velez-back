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

      <form method="POST" action="/create_matrix">
        {{ csrf_field() }}
        Matrix size 
        <input>
        <input value="create" type="submit">
      </form>

      <hr>

      <form method="POST" action="/update">
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
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Y
              </td>
              <td>
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Z
              </td>
              <td>
                <input>
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

      <form method="POST" action="/query">
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
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Y1
              </td>
              <td>
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Z1
              </td>
              <td>
                <input>
              </td>
            </tr>
            <tr>
              <td>
                X2
              </td>
              <td>
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Y2
              </td>
              <td>
                <input>
              </td>
            </tr>
            <tr>
              <td>
                Z2
              </td>
              <td>
                <input>
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
    </div>

  </body>
</html>
