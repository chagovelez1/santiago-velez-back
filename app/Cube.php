<?php

namespace App;

class Cube {
  
  private $matix;
  private $validation_enabled;
  
  function __construct($size,$validate=false) {
    for ($x = 0; $x <= $size - 1; $x++) {
      for ($y = 0; $y <= $size - 1; $y++) {
        for ($z = 0; $z <= $size - 1; $z++) {
          $matrix[$x][$y][$z]=0;
        }
      }
    }
    $this->matix = $matrix;
    $this->validation_enabled = $validate;
  }
  
  public function update($x,$y,$z,$val){
    $this->matix[$x-1][$y-1][$z-1] = (float)$val ;
  }
  
  public function query($x1,$y1,$z1,$x2,$y2,$z2){
    $result = 0;
    for ($x = $x1-1 ; $x <= $x2-1; $x++) {
      for ($y = $y1-1 ; $y <= $y2-1; $y++) {
        for ($z = $z1-1 ; $z <= $z2-1; $z++) {
          $result += $this->matrix[$x][$y][$z];
        }
      }
    }
    return $result;
  }
  
  
}

