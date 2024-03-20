<?php
include "traitement.php";

$stmt = $pdo->prepare("select * from  candidat");
if ($stmt->execute()) {
    $candidat = $stmt->fetchAll();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Espace administratif</title>
    <link rel="stylesheet" href="Admin.css">
    </link>
    <meta charset="utf-8" />
</head>

<body>
    <form action="supprimer.php" method="post">
        <div class="container">

            
            <table class="t1">
            

                <caption>Les Candidatures :</caption>
                <h1 id="GrandTitre">Espace Administrateur</h1>

                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse e-mail</th>
                    <th>Numéro de téléphone</th>
                    <th>Numéro et rue</th>
                    <th>Code postal </th>
                    <th>Ville</th>
                    <th>CV</th>
                    <th>Lettre de Motivation</th>
                    <th>Refus</th>
                </tr>

                <?php foreach ($candidat as $d) { ?>
                    <tr>
                        <th>
                            <?php echo $d["nom"] ?>
                        </th>
                        <th>
                            <?php echo $d["prenom"] ?>
                        </th>
                        <th>
                            <?php echo $d["mail"] ?>
                        </th>
                        <th>
                            <?php echo $d["numTel"] ?>
                        </th>
                        <th>
                            <?php echo $d["numEtRue"] ?>
                        </th>
                        <th>
                            <?php echo $d["CP"] ?>
                        </th>
                        <th>
                            <?php echo $d["ville"] ?>
                        </th>
                        <th>
                            <a href="<?php echo $d["urlCV"] ?>" class="button">Accès</a>
                        </th>
                        <th>
                            <a href="<?php echo $d["urlLettre"] ?>" class="button">Accès</a>
                        </th>
                        <th>
                            <form action="supprimer.php" method="post">
                                <input type="submit" id="id" name="id" value="<?php echo $d["id"] ?>" class="button1" />
                            </form>
                        </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <footer>

        </footer>
</body>

</html>