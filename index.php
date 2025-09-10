<?php
// daftar tugas
$tugas = [
    "objeksegitiga.php" => "Tugas Segitiga"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Tugas PBO</title>
    <link rel="stylesheet" href="cantik.css">
</head>
<body>
    <h1>Daftar Tugas PBO</h1>
    <ul>
        <?php foreach ($tugas as $file => $judul): ?>
            <li><a href="<?= $file ?>"><?= $judul ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
