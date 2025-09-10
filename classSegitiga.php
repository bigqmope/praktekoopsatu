<?php
class segitiga {
  private $a;
  private $b;
  private $c;
  private $alas;
  private $tinggi;

public function__construct($a,$b,$c, $alas, $tinggi) {
  $this->a=$a;
  $this->b=$b;
  $this->c=$c;
  $this->alas=$alas;
  $this->tinggi=$tinggi;
}

public function luas() {
  return 0.5 * $this->alas * $this->tinggi;
}

public function keliling() {
  return $this->a + $this->b + $this->c;
}

/*public function CekJenis() {
  if */
?>
