<?php
$servername = "192.168.1.56";
$username = "bddquery";
$password = "EET";
$dbname = "ppe3";

try {
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error;
}

if (isset($_POST['id'])) {
    $supr = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM candidat
    WHERE id = :id");

    $return = $stmt->execute([
        ':id' => $supr

    ]);

    header('Location: Admin.php');
}


?>