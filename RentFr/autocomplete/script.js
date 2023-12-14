// autocompletion
function autocomplet() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#cop_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#nom_list_id').show();
				$('#nom_list_id').html(data);
			}
		});
	} else {
		$('#nom_list_id').hide();
	}
}

// Lors du choix dans la liste
function set_item(item) {
	// change input value
	$('#cop_bien').val(item);
	$('#cop2_bien').val(item);
	// hide proposition list
	$('#nom_list_id').hide();
}