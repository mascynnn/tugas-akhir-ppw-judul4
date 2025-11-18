<?php include "check_login.php"; ?>

<?php
$contacts = json_decode(file_get_contents("contacts.json"), true);

$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $nomor = trim($_POST["nomor"]);

    if ($nama == "" || $nomor == "") {
        $err = "Nama dan nomor wajib diisi!";
    } else {
        $contacts[] = ["nama" => $nama, "nomor" => $nomor];
        file_put_contents("contacts.json", json_encode($contacts, JSON_PRETTY_PRINT));
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Tambah Kontak</h2>

<?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>

<form method="POST">
    <label>Nama</label>
    <input type="text" name="nama">

    <label>Nomor</label>
    <input type="text" name="nomor">

    <button type="submit">Simpan</button>
</form>

</div>

</body>
</html>