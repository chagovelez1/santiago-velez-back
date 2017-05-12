<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CubeController extends Controller {

  public function create(Request $request) {
    $this->validate($request, [
        'size'=>'required|max:100|min:1'
    ]);
    
    $size = $request->size;
    $matrix[][][]=0;
    dd($matrix);
    Session::put('matrix', $size);
    return view('welcome');
    
  }

  public function query() {
    return view('welcome', ['result'=>'test']);
  }

}
