<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="css/formulaire.css">
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <form method="POST" action="connexion1.php">
            <a href="index.html">
                <div class="logo-details">
                    <i class="bx bxl-c-plus-plus"></i>
                </div>
            </a>
            <h1>Se connecter</h1>
            <p>Connecter vous avec vos identifients</p>

            <div class="input">
                <tr>
                    <td> <input type="email" name="mail" placeholder="Email" /> </td>
                </tr>
                <tr>
                <br>
                <input type="password" name="mdp" 
                       id="mdp" size="20" 
                       placeholder="Mot de passe ">
                </tr>
            </div>
            <div align="center">
                <button type="submit">Connexion</button>
            </div>


            <a href="">
            </a>

        </form>
    </body>
</html>
