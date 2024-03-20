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

if (isset($_POST['nom'])) {

    $uploadcv = '.\CV\\';
    $uploadfile = $uploadcv . basename($_FILES['cv']['name']);

    $uploadlettre = '.\lettre\\';
    $uploadfileL = $uploadlettre . basename($_FILES['lettre']['name']);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $numeroderue = $_POST['numeroderue'];
    $code = $_POST['code'];
    $ville = $_POST['ville'];
    move_uploaded_file($_FILES['cv']['tmp_name'], $uploadfile);
    move_uploaded_file($_FILES['lettre']['tmp_name'], $uploadfileL);
    
    $stmt = $pdo->prepare("INSERT INTO candidat (nom, prenom, mail, numTel, numEtRue, CP, ville, urlCV, urlLettre)
    VALUES (:nom, :prenom, :mail, :numTel, :numEtRue, :CP, :ville, :urlCV, :urlLettre)");

$return = $stmt->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':mail' => $email,
    ':numTel' => $numero,
    ':numEtRue' => $numeroderue,
    ':CP' => $code,
    ':ville' => $ville,
    ':urlCV' => $uploadfile,
    ':urlLettre' => $uploadfileL
]); 

$_SESSION["nom"] = $nom;
    header('Location: poste.html');
    exit();
}
    
?>