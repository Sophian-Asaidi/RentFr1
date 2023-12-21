$(function () {
    $("#lib_type_bien").autocomplete({
        source: "../autocomplete/autocomplete_type_bien.php",
        select: function (event, ui) {
            // Set the selected label (property name) as the input value
            $(this).val(ui.item.label);
            return false;
        }
    });
});
$(function() {
    $(".lib_type_bien_input").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "../autocomplete/autocomplete_type_bien.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            // Vous pouvez accéder à l'ID du type de bien sélectionné avec ui.item.id
            console.log(ui.item.id);
        }
    });
});
