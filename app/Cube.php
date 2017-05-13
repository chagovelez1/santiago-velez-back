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
      abort(400, 'the X parameters should be between 1 and '.$this->N.' you input '.$x);
    }
    if ($y < 1 or $this->N < $y) {
      abort(400, 'the Y parameters should be between 1 and '.$this->N.' you input '.$y);
    }
    if ($z < 1 or $this->N < $z) {
      abort(400, 'the Z parameters should be between 1 and '.$this->N.' you input '.$z);
    }
    if ($val < 1 or $this->N < $val) {
      abort(400, 'the VAl pameters for update should be between 1 and '.$$this->N.' you input '.$val);
    }
  }
  
  private function validateQuery($x1, $y1, $z1, $x2, $y2, $z2) {
    
}

}
