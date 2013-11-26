$(function(){
	$('#vil').autocomplete({
		source : './ajax/listeVille.php',
		minLength: 3,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
});