<?php

namespace App;

class Cube {

  private $matrix;
  private $validation_enabled;
  private $N;

  function __construct($size, $validate=false) {
    if ($validate=TRUE) {
      $this->validateSize($size);
    }
    for ($x=0; $x<=$size-1; $x++) {
      for ($y=0; $y<=$size-1; $y++) {
        for ($z=0; $z<=$size-1; $z++) {
          $matrix[$x][$y][$z]=0;
        }
      }
    }
    $this->matrix=$matrix;
    $this->validation_enabled=$validate;
    $this->N = $size;
  }

  public function update($x, $y, $z, $val) {
    if($this->validation_enabled){
      $this->validateUpdate($x, $y, $z, $val);
    }
    $this->matrix[$x-1][$y-1][$z-1]=(float)$val;
  }

  public function query($x1, $y1, $z1, $x2, $y2, $z2) {
    if($this->validation_enabled){
      $this->validateQuery($x1, $y1, $z1, $x2, $y2, $z2);
    }
    $result=0;
    for ($x=$x1-1; $x<=$x2-1; $x++) {
      for ($y=$y1-1; $y<=$y2-1; $y++) {
        for ($z=$z1-1; $z<=$z2-1; $z++) {
          $result += $this->matrix[$x][$y][$z];
        }
      }
    }
    return $result;
  }

  private function validateSize($size) {
    if ($size<1 or 100<$size) {
      abort(400, 'Cube size must be between 1 and 100, you input '.$size);
    }
  }
  
  private function validateUpdate($x, $y, $z, $val) {
    if ($x < 1 or $this->N < $x) {
      abort(400, 'the X parameters of in UPDATE should be between 1 and '.$this->N.' you input '.$x);
    }
    if ($y < 1 or $this->N < $y) {
      abort(400, 'the Y parameters in UPDATE should be between 1 and '.$this->N.' you input '.$y);
    }
    if ($z < 1 or $this->N < $z) {
      abort(400, 'the Z parameters in UPDATE should be between 1 and '.$this->N.' you input '.$z);
    }
    if ($val < -1000000000 or 1000000000 < $val) {
      abort(400, 'the VAl pameters for UPDATE should be between -1000000000 and 1000000000 you input '.$val);
    }
  }
  
  private function validateQuery($x1, $y1, $z1, $x2, $y2, $z2) {
     if ($x1 < 1 or $this->N < $x1) {
      abort(400, 'the X1 parameters should be between 1 and '.($this->N).' you input '.$x1);
    }
     if ($y1 < 1 or $this->N < $y1) {
      abort(400, 'the Y1 parameters should be between 1 and '.($this->N).' you input '.$y1);
    }
     if ($z1 < 1 or $this->N < $z1) {
      abort(400, 'the Z1 parameters should be between 1 and '.($this->N).' you input '.$z1);
    }
    if ($x2 < $x1 or $this->N < $x2) {
      abort(400, 'the X2 parameters should be between X1  and '.($this->N).' you input '.$x2);
    }
    if ($y2 < $y1 or $this->N < $y2) {
      abort(400, 'the Y2 parameters should be between Y1  and '.($this->N).' you input '.$y2);
    }
    if ($z2 < $z1 or $this->N < $z2) {
      abort(400, 'the Z2 parameters should be between Z1  and '.($this->N).' you input '.$z2);
    }
}

}
