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

if (isset($_POST["nom"])) {

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
    $annonce = $_POST['IdAnnonce'];
    
    $stmt = $pdo->prepare("INSERT INTO candidat (nom, prenom, mail, numTel, numEtRue, CP, ville, urlCV, urlLettre , idAnnonce)
    VALUES (:nom, :prenom, :mail, :numTel, :numEtRue, :CP, :ville, :urlCV, :urlLettre, :annonce)");

$return = $stmt->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':mail' => $email,
    ':numTel' => $numero,
    ':numEtRue' => $numeroderue,
    ':CP' => $code,
    ':ville' => $ville,
    ':urlCV' => $uploadfile,
    ':urlLettre' => $uploadfileL,
    ':annonce' => $annonce
]); 

$_SESSION["nom"] = $nom;
    header('Location: poste.html');
    exit();
}
    
?>