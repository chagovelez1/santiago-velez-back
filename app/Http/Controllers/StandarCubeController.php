<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cube;

class StandarCubeController extends Controller {

  public function index() {
    return view('standar');
  }

  public function test(Request $request) {
    $commands=explode(PHP_EOL, $request->input);

    //set T value and validate it
    $T=$commands[0];
    $this->validation('T', ['T'=>$T]);

    //loop thrhug test cases
    $rows_to_jum=1;
    for ($test_index=1; $test_index<=$T; $test_index++) {
      $N_M=explode(' ', $commands[$rows_to_jum]);
      $N=$N_M[0];
      $M=$N_M[1];
      $this->validation('M', ['M'=>$M]);
      $Cube = new Cube($N,TRUE);
      dd($Cube);
    }
  }

  private function validation($type, $arr_vals) {
    switch ($type) {
      case 'T':
        if ($arr_vals['T']<=1 or 50<=$arr_vals['T']) {
          return abort(400, 'T must be between 1 and 50, you input '.$arr_vals['T']);
        }
        break;
      case 'M':
        if ($arr_vals['M']<=1 or 1000<=$arr_vals['M']) {
          return abort(400, 'M must be between 1 and 1000, you input '.$arr_vals['M']);
        }
        break;
    }
  }

}
