<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//custom
use App\Cube;

class CubeTest extends TestCase {

  //test for cube creation
  public function testCubeCreationInvalidUpper() {
    $this->expectException('Symfony\Component\HttpKernel\Exception\HttpException');
    new Cube(101);
  }

  public function testCubeCreationInvalidLower() {
    $this->expectException('Symfony\Component\HttpKernel\Exception\HttpException');
    new Cube(0);
  }

  public function testCubeCreationValidUpper() {
    $cube=new Cube(100);
    $this->assertInstanceOf('App\Cube', $cube);
  }

  public function testCubeCreationValidLower() {
    $cube=new Cube(1);
    $this->assertInstanceOf('App\Cube', $cube);
  }

  //test for cube update
  public function testCubeUpdate() {
    $cube=new Cube(3);
    $cube->update(1, 1, 1, 7);
    $this->assertEquals(7, $cube->getMatrix()[0][0][0]);
  }

  //test query (multiple sums)
  public function testCubeQuery() {
    $cube=new Cube(3);
    $cube->update(1, 1, 1, 7);
    $cube->update(2, 1, 1, 2);
    $cube->update(2, 1, 3, 5);
    $this->assertEquals(9, $cube->query(1, 1, 1, 2, 2, 2));
    $this->assertEquals(7, $cube->query(1, 1, 1, 1, 2, 2));
    $this->assertEquals(14, $cube->query(1, 1, 1, 3, 3, 3));
  }

}
