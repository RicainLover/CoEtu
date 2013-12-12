$(function(){
	$('#vil').autocomplete({
		source : './ajax/getListeVille.php',
		minLength: 1,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
	
	$('#camp').autocomplete({
		source : './ajax/getListeCampus.php',
		minLength: 1,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
	
});