<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Professionnel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="header-section">
        <div class="top-band"></div>
        <div class="bottom-band"></div>
        <div class="container">
            <header class="navbar">
                <div class="logo">
                    <img src="images/Progrès-remove.png" alt="bproo logo">
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Acceuil</a></li>
                        <li><a href="Aproposdemoi.html">À propos de moi</a></li>
                        <li><a href="Expériences.html">Expériences</a></li>
                        <li><a href="Compétences.html">Compétences</a></li>
                        <li><a href="Formations.html">Formations</a></li>
                        <li><a href="Projets.html">Projets</a></li>
                        <li><a href="Centres d'intérêt.html">Centres d'intérêt</a></li>
                        <li><a href="Contacts.html">Contacts</a></li>
                    </ul>
                </nav>
            </header>
            <div class="row">
                <div class="col-2">
                    <div id="confirmation" style="display:none; font-size: 24px; color: green; text-align: center; margin-top: 20px;">
                        Message envoyé avec succès !
                    </div>
                </div>

            </div>
    </section>
</body>
</html>

            <?php
// Connexion à la base de données 
$dsn = 'mysql:host=127.0.0.1;dbname=contact';
$username = 'root';


try { 
    $conn = new PDO("mysql:host=$servname;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "La connexion a été bien établie";
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}

$messageEnvoye = false;

if (isset($_POST["Envoyer"])) {   
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $sql = "INSERT INTO `user` (`Nom`, `Email`, `Message`) VALUES (:Nom, :Email, :Message)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":Nom", $name);
    $stmt->bindParam(":Email", $email);
    $stmt->bindParam(":Message", $message);

    if ($stmt->execute()) {
        $messageEnvoye = true;
        echo "<script>document.getElementById('confirmation').style.display = 'block';</script>";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
}
?>

