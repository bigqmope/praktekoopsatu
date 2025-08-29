<?php
/*class PersegiPanjang {
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
echo "Keliling: " . $persegi->hitungKeliling() . "\n"; // Output: Keliling: 30*/

/* class Produk {
    public $nama;
    public $harga;
    public $stok;
    //method menampilkan stok
    public function tampilkanInfo() {
        return "Buah $this->nama dengan harga $this->harga, stok sisa $this->stok";
    }
    //method beliProduk($jumlah)
    public function beliProduk($jumlah) {
        if ($jumlah <= $this->stok) {
            $this->stok -= $jumlah;
            return "Pembelian berhasil. Sisa stok: $this->stok";
        } else {
            return "Stok tidak cukup untuk membeli $jumlah buah.";
        }
    }
}
// membuat objek:
$belanja = new Produk();
$belanja->nama = "Alpukat";
$belanja->harga = 20000;
$belanja->stok = 30;
//menampilkan output
echo $belanja->tampilkanInfo();
echo "\n";
echo $belanja->beliProduk(2);
echo "\n";
echo $belanja->tampilkanInfo();
echo "\n"; */

class User {
    public $username;
    public $password;

    //contruction untuk mengisi username dan password
    public function_construct ($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    public function
?>

