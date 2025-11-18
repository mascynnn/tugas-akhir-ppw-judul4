<?php include "check_login.php"; ?>

<?php
$contacts = json_decode(file_get_contents("contacts.json"), true);
$id = $_GET["id"];

$err = "";
$data = $contacts[$id];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $nomor = trim($_POST["nomor"]);

    if ($nama == "" || $nomor == "") {
        $err = "Semua field wajib diisi!";
    } else {
        $contacts[$id] = ["nama" => $nama, "nomor" => $nomor];
        file_put_contents("contacts.json", json_encode($contacts, JSON_PRETTY_PRINT));

        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>

<div class="container">
<h2>Edit Kontak</h2>

<?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>

<form method="POST">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>">

    <label>Nomor</label>
    <input type="text" name="nomor" value="<?= $data['nomor'] ?>">

    <button type="submit">Update</button>
</form>
</div>

</body>
</html>