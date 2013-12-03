$(function(){
	$('#vil').autocomplete({
		source : './ajax/listeVille.php',
		minLength: 1,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
	
	$('#camp').autocomplete({
		source : './ajax/listeCampus.php',
		minLength: 1,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
	
});