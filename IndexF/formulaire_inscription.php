<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RentFR</title>
        <link rel="stylesheet" href="../css/cssinsc.css">
        <script>
            function confirmerInscription() {
                var confirmation = confirm("Voulez-vous vraiment vous inscrire?");
                if (confirmation) {
                    return true;
                } else {
                    alert("Inscription annulée.");
                    return false;
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>
    <body>
        <form action="../traitement/client.traitement.php" method="post" class="formulaire-insertion"
              onsubmit="return confirmerInscription()">
            <h2>Inscription</h2>
            <label for="nom_client" class="formulaire-label">Nom Client : </label>
            <input type="text" name="nom_client" id="nom_client" class="formulaire-input">

            <label for="prenom_client" class="formulaire-label">Prenom Client : </label>
            <input type="text" name="prenom_client" id="prenom_client" class="formulaire-input">


            <label for="cop_client" class="formulaire-label">Code postal : </label>
            <input type="text" name="cop_client" id="cop_client" class="formulaire-input">
            <div id="copSuggestions"></div>

            <label for="vil_client" class="formulaire-label">Ville client : </label>
            <input type="text" name="vil_client" id="vil_client" class="formulaire-input">
            <div id="vilSuggestions"></div>

            <script>
                $(document).ready(function () {
                    $("#vil_client, #cop_client").on("input", function () {
                        var keyword = $(this).val();
                        var suggestionContainerId = $(this).attr("id") + "Suggestions";

                        if (keyword !== "") {
                            $.ajax({
                                url: "../autocomplete/autocomp2.php",
                                method: "POST",
                                data: {keyword: keyword, type: $(this).attr("id")},
                                success: function (data) {
                                    $("#" + suggestionContainerId).html(data);
                                }
                            });
                        } else {
                            $("#" + suggestionContainerId).html("");
                        }
                    });

                    // Gérez la sélection d'une suggestion ici et remplissez le champ approprié.
                    $(document).on("click", "#vilSuggestions li", function () {
                        var selectedValue = $(this).text();
                        $("#vil_client").val(selectedValue);
                        $("#vilSuggestions").html(""); // Cache les suggestions
                    });

                    $(document).on("click", "#copSuggestions li", function () {
                        var selectedValue = $(this).text();
                        $("#cop_client").val(selectedValue);
                        $("#copSuggestions").html(""); // Cache les suggestions
                    });
                });

            </script>

            <label for="mail_client" class="formulaire-label">Mail client : </label>
            <input type="text" name="mail_client" id="mail_client" class="formulaire-input">

            <label for="pass_client" class="formulaire-label">Mdp Client : </label>
            <input type="password" name="pass_client" id="pass_client" class="formulaire-input">

            <!--<label for="statut_client" class="formulaire-label">Statut du client : </label>-->
            <input type="text" name="statut_client" id="statut_client" class="formulaire-input" hidden>

            <!--<label for="valid_client" class="formulaire-label">Client valide ? </label>-->
            <input type="text" name="valid_client" id="valid_client" class="formulaire-input" hidden>
            <input type="submit" name="oNouveauClient" value="S'inscrire" class="btn btn-primary">
        </form>
    </body>
