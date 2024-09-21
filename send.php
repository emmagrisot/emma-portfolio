<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoi d'un message par formulaire</title>
</head>

<body>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $company = htmlspecialchars($_POST['company']);
    $message = htmlspecialchars($_POST['message']);
    
    // Adresse e-mail destinataire 
    $to = "emma.grisot@gmail.com";
    
    // Sujet de l'email
    $subject = "Yay! Nouveau message depuis emmagrisot.com";

    // Contenu de l'email
    $email_content = "Nom: $firstname $lastname\n";
    $email_content .= "Email: $email\n";
    if ($company) {
        $email_content .= "Entreprise: $company\n";
    }
    $email_content .= "Message:\n$message\n";

    // En-têtes
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>


</body>
</html>
