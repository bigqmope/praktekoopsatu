<?php
class Mahasiswa {
    public $nama;
    public $nim;

    public function tampilData() {
        return "Nama: $this->nama, NIM: $this->nim";
    }
}

$mhs = new Mahasiswa();
$mhs->nama = "Budi";
$mhs->nim  = "220101001";

echo $mhs->tampilData();
// Output: Nama: Budi, NIM: 220101001
