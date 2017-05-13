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
    $results = '';
    for ($test_index=1; $test_index<=$T; $test_index++) {
      $N_M=explode(' ', $commands[$rows_to_jum]);
      $N=$N_M[0];
      $M=$N_M[1];
      $this->validation('M', ['M'=>$M]);
      $cube = new Cube($N,TRUE);
      $operations = array_slice($commands, $rows_to_jum+1, $M);
      $results .= $this->perform_operations($cube, $operations);
      $rows_to_jum += $M+1;
    }
    return $results;
  }
  
  private function perform_operations(Cube $cube,$operations) {
    $results = '';
    foreach ($operations as $op){
      $params = explode(' ', $op);
      if(!count($params)>1){
            abort(400,' Empty operation, opertions must start with "UPDATE" or "QUERY" string');
      }
      switch ($params[0]){
        case 'UPDATE':
          if(count($params)!= 5){
            abort(400,'An UPDATE operation must have 5 params, check you inputs and try again');
          }
          $cube->update($params[1], $params[2], $params[3], $params[4]);
          break;
        case 'QUERY':
          if(count($params)!= 7){
            abort(400,'A QUERY operation must have 7 params, check you inputs and try again');
          }
          $results .= $cube->query($params[1], $params[2], $params[3], $params[4], $params[5], $params[6]);
          break;
        default :
          abort(400,'you input a non valid operation:'. $params[0]);
          break;
      }
    }
    return $results;
  }

  private function validation($type, $arr_vals) {
    switch ($type) {
      case 'T':
        if ($arr_vals['T']<1 or 50<$arr_vals['T']) {
          return abort(400, 'T must be between 1 and 50, you input '.$arr_vals['T']);
        }
        break;
      case 'M':
        if ($arr_vals['M']<1 or 1000<$arr_vals['M']) {
          return abort(400, 'M must be between 1 and 1000, you input '.$arr_vals['M']);
        }
        break;
    }
  }

}
