<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CubeController extends Controller {

  public function create(Request $request) {
    $this->validate($request, [
        'size' => 'required|max:100|min:1'
    ]);

    $size = $request->size;
    $matrix[][][] = 0;
    for ($x = 0; $x <= $size - 1; $x++) {
      for ($y = 0; $y <= $size - 1; $y++) {
        for ($z = 0; $z <= $size - 1; $z++) {
          $matrix[$x][$y][$z]=0;
        }
      }
    }
    $request->session()->put('matrix', $matrix);
    $request->session()->put('N', $size);
    return view('welcome');
  }
  
  public function update(Request $request) {
    $N = $request->session()->get('N');
    $this->validate($request, [
        'x' => 'required|numeric|min:1|max:'.$N,
        'y' => 'required|numeric|min:1|max:'.$N,
        'z' => 'required|numeric|min:1|max:'.$N,
        'val' => 'required|numeric|min:-1000000000|max:1000000000',
    ]);
    
    $matrix = $request->session()->pull('matrix');
    $matrix[$request->x-1][$request->y-1][$request->z-1] = (float)$request->val ;
    $request->session()->put('matrix', $matrix);
    dd(session('matrix'));
    return view('welcome');
  }

  public function query() {
    return view('welcome', ['result' => 'test']);
  }

}
