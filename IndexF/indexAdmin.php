`<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            header {
                background-color: #343a40;
                padding: 20px;
                text-align: center;
                color: white;
            }

            .navbar {
                background-color: #343a40;
            }

            .navbar a {
                color: white;
            }

            .navbar a:hover {
                background-color: #ddd;
                color: black;
            }

            .container {
                padding: 20px;
            }

            h2,h1 {
                color: blue;
            }

            .service {
                padding: 20px;
                background-color: #fff;
                margin-bottom: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .employee {
                padding: 20px;
                background-color: #fff;
                margin-bottom: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .employee img {
                max-width: 100%;
                border-radius: 5px;
            }

            @media (max-width: 768px) {
                .navbar a {
                    display: block;
                    width: 100%;
                    text-align: center;
                }
            }

        </style>
    </head>

    <body>
        <header>
            <h1>Espace Admin </h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Accueil site</a>
            <a class="navbar-brand" href="../affichage/aff_bien.php">Nos biens</a>
            <a class="navbar-brand" href="../affichage/aff_client.php">Nos clients</a>
            <a class="navbar-brand" href="../affichage/aff_reservation.php">Nos réservations</a>
            <a class="log_out" href="deconnexion.php">Deconnexion</a>
            
        </nav>

        <div class="container"><br><br><br><br><br><br>
            <section class="service">
                <h2>Espace Admin</h2>
                 </section>

            
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
`