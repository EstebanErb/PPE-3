<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppe3";

try {
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error;
}

$stmt = $pdo->prepare("select * from rhadmin");
if ($stmt->execute()) {
    $rhadmin = $stmt->fetchAll();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $mdp = $_POST['motdepasse'];

    foreach ($rhadmin as $d){
        if ( $d["numIDEnt"] == $id && $d["hashMdp"] == $mdp ){
            header('Location: admin.php');
            exit();
        } else {
            header('Location: log.html');
            exit();
        }
    }
} 
?>