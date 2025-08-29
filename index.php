<?php
class PersegiPanjang {
    public $panjang;
    public $lebar;
    // Method untuk menghitung luas
    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
    // Method untuk menghitung keliling
    public function hitungKeliling(){
        return 2 * ($this->panjang + $this->lebar);
    }
}
// Contoh penggunaan:
$persegi = new PersegiPanjang();
$persegi->panjang = 10;
$persegi->lebar = 5;
echo "Luas: " . $persegi->hitungLuas() . "\n";         // Output: Luas: 50
echo "Keliling: " . $persegi->hitungKeliling() . "\n"; // Output: Keliling: 30

/*class Produk {
    public $nama;
    public $harga;
    public $stok;

    //method menampilkan stok
    public function tampilkanInfo()
}
// membuat objek:
$belanja = new $Produk();
$belanja->nama = "Alpukat";
$belanja->harga = 20000;
$belanja->stok = "ada";*/

?>
