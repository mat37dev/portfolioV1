<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])){
        // Récupérez les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $objet = $_POST['objet'];
        $message = $_POST['message'];

        // Définissez les en-têtes de l'e-mail
        $headers = "From: $nom <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoyez l'e-mail
        if (mail('mathieu.crosnier15@outlook.fr', $objet, $message, $headers)) {
            // L'e-mail a été envoyé avec succès
            $info = "L'e-mail a été envoyé avec succès";
        } else {
            // Il y a eu une erreur lors de l'envoi de l'e-mail
            $info = "Il y a eu une erreur lors de l'envoi de l'e-mail";
        }
    }
    else{
        $info = "Des informations sont manquantes.";
    }
    header("Location: ../index.html");
}
else{
    header('Location: ../index.html');
}

