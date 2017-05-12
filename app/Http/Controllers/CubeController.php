<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CubeController extends Controller {
  
  public function index(){
    return view('cube');
  }

  public function create(Request $request) {
    $this->validate($request, [
        'size' => 'required|numeric|max:100|min:1'
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
    return redirect('cube')->with('message','Matrix of size '.$size.' created.');
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
    $old_val = $matrix[$request->x-1][$request->y-1][$request->z-1];
    $matrix[$request->x-1][$request->y-1][$request->z-1] = (float)$request->val ;
    $request->session()->put('matrix', $matrix);
    $message = '('.$request->x.','.$request->y.','.$request->z.') updated from val = '.$old_val.' to val ='.$request->val;
    return redirect('cube')->with('message',$message);
  }
 
  public function query(Request $request) {
    $N = $request->session()->get('N');
    $this->validate($request, [
        'x1' => 'required|numeric|min:1|max:'.($N-1),
        'y1' => 'required|numeric|min:1|max:'.($N-1),
        'z1' => 'required|numeric|min:1|max:'.($N-1),
        'x2' => 'required|numeric|min:'.$request->x1.'|max:'.$N,
        'y2' => 'required|numeric|min:'.$request->y1.'|max:'.$N,
        'z2' => 'required|numeric|min:'.$request->z1.'|max:'.$N
    ]);
    
    $result = 0;
    $matrix = $request->session()->get('matrix');
    for ($x = $request->x1-1 ; $x <= $request->x2-1; $x++) {
      for ($y = $request->y1-1 ; $y <= $request->y2-1; $y++) {
        for ($z = $request->z1-1 ; $z <= $request->z2-1; $z++) {
          $result += $matrix[$x][$y][$z];
        }
      }
    }
    return redirect('cube')->with('message','THE QUERY RESULT IS: '.$result);
  }

}
