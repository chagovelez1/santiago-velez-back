<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cube;

class CubeController extends Controller {
  
  public function index(){
    return view('cube');
  }

  public function create(Request $request) {
    $this->validate($request, [
        'size' => 'required|numeric|max:100|min:1'
    ]);

    $size = $request->size;
    $cube = new Cube($size);
    $request->session()->put('cube', $cube);
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
    
    $cube = $request->session()->pull('cube');
    $cube->update($request->x,$request->y,$request->z,$request->val);
    $request->session()->put('cube', $cube);
    $message = '('.$request->x.','.$request->y.','.$request->z.') updated to val ='.$request->val;
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
    $cube = $request->session()->get('cube');
    $result = $cube->query($request->x1,$request->y1,$request->z1,$request->x2,$request->y2,$request->z2);
    return redirect('cube')->with('message','THE QUERY RESULT IS: '.$result);
  }

}
