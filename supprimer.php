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

if (isset($_POST['id'])) {
    $supr = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM candidat
    WHERE id = :id");

    $return = $stmt->execute([
        ':id' => $supr

    ]);

    //envoie d'un mail ( ne marche pas )
    $expediteur = "admin@domain.com";
    date("D, j M Y H:i:s"); //date
    $entete = "From: $expediteurn"; // expéditeur
    $entete .= "Cc: n";
    $entete .= "Reply-To: $expediteur n";
    $entete .= "Date: ". date("D, j M Y H:i:s");
    mail( "esteban.erb@lycee-pardailhan.fr", "Communication", "test de mail.", $entete);

    header('Location: Admin.php');
}


?>