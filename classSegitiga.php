<?php
class segitiga {
  private $a;
  private $b;
  private $c;
  private $alas;
  private $tinggi;

public function __construct($a,$b,$c, $alas, $tinggi) {
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

public function CekJenis() {
  if ($this->a == $this->b && $this->b == $this->c) {
    return "Sama sisi";
  } 
  elseif ($this->a == $this->b || $this->b == $this->c || $this->a == $this->c) {
    return "Sama kaki";
  }
  else {
    return "Sembarang";
  }
}

public function CetakInfo() {
  echo "=====INFORMASI SEGITIGA=====<br>";
  echo "Alas: " . $this->alas . "<br>";
  echo "Tinggi: " . $this->tinggi . "<br>";
  echo "Sisi: " . $this->a, $this->b, $this->c . "<br>";
  echo "Luas: " . $this->luas() . "<br>";
  echo "Keliling: " . $this->keliling() . "<br>";
  echo "Jenis: " . $this->CekJenis() . "<br>";
  echo "============================<br><br>";
  }
}
?>
<a href="index.php">Kembali ke halaman Index</a>
