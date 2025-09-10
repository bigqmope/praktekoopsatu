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
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #808000; }
        h1 { color: #333; align-text: center;}
        ul { list-style: none; padding: 0; }
        li { margin: 10px 0; }
        a { text-decoration: none; color: white; background: #007BFF; padding: 10px 15px; border-radius: 5px; align-text: center;}
        a:hover { background: #0056b3; }
    </style>
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
