<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RentFR</title>
        <link rel="stylesheet" href="../css/cssinsc.css">
    </head>
    <body>
        <form action="../insert/insert_client.php" method="post" class="formulaire-insertion">
            <h2>Inscription</h2>
            <label for="nom_client" class="formulaire-label">Nom Client : </label>
            <input type="text" name="nom_client" id="nom_client" class="formulaire-input">

            <label for="prenom_client" class="formulaire-label">Prenom Client : </label>
            <input type="text" name="prenom_client" id="prenom_client" class="formulaire-input">


            <label for="cop_client" class="formulaire-label">Code postal : </label>
            <input type="text" name="cop_client" id="cop_client" class="formulaire-input">

            <label for="vil_client" class="formulaire-label">Ville client : </label>
            <input type="text" name="vil_client" id="vil_client" class="formulaire-input">

            <label for="mail_client" class="formulaire-label">Mail client : </label>
            <input type="text" name="mail_client" id="mail_client" class="formulaire-input">

            <label for="pass_client" class="formulaire-label">Mdp Client : </label>
            <input type="password" name="pass_client" id="pass_client" class="formulaire-input">

            <label for="statut_client" class="formulaire-label">Statut du client : </label>
            <input type="text" name="statut_client" id="statut_client" class="formulaire-input">

            <label for="valid_client" class="formulaire-label">Client valide ? </label>
            <input type="text" name="valid_client" id="valid_client" class="formulaire-input">
            <input type="submit" name="oNouveauClient" value="S'inscrire" class="btn btn-primary">
        </form>
    </body>
