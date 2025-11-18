<?php include "check_login.php"; ?>

<?php
    $contacts = json_decode(file_get_contents("contacts.json"), true);
    $id = $_GET["id"];

    unset($contacts[$id]);
    $contacts = array_values($contacts);

    file_put_contents("contacts.json", json_encode($contacts, JSON_PRETTY_PRINT));
    header("Location: index.php");
exit();