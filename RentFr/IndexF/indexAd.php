<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Real Estate Agency</title>
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

            h2 {
                color: #333;
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
            <h1>Welcome to our Real Estate Agency</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Accueil site</a>
            <a class="navbar-brand" href="../affichage/aff_bien.php">Nos biens</a>
            <a class="navbar-brand" href="../affichage/aff_client.php">Nos clients</a>
            <a class="navbar-brand" href="../affichage/aff_reservation.php">Nos res</a>
            <a class="navbar-brand" href="../affichage/aff_type_bien.php">Type bien</a>
        </nav>

        <div class="container">
            <section class="service">
                <h2>Nos Services</h2>
                <p>Explore our range of real estate services tailored to meet your needs</p>
            </section>

            <section class="employee">
                <h2>Meet Our Team</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="employee1.jpg" alt="Employee 1">
                        <h4>Saadan</h4>
                        <p>Agent immobilier</p>
                    </div>
                    <div class="col-md-4">
                        <img src="employee2.jpg" alt="Employee 2">
                        <h4>Asaidi</h4>
                        <p> Manager</p>
                    </div>

                </div>
            </section>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
