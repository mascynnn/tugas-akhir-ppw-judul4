<?php include "check_login.php"; ?>

<?php
    $contacts = json_decode(file_get_contents("contacts.json"), true);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" style="width:600px;">
    <h2>Daftar Kontak</h2>
    <p>Login sebagai: <b><?php echo $_SESSION["username"]; ?></b></p>

    <a href="add.php">Tambah Kontak</a> | 
    <a href="logout.php">Logout</a>
    <br><br>

    <table>
        <tr>
            <th>Nama</th>
            <th>Nomor</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($contacts as $i => $c): ?>
        <tr>
            <td><?= $c["nama"] ?></td>
            <td><?= $c["nomor"] ?></td>
            <td>
                <a href="edit.php?id=<?= $i ?>">Edit</a> | 
                <a href="delete.php?id=<?= $i ?>" onclick="return confirm('Yakin ingin hapus kontak?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

</body>
</html>