$(function(){
	$('#vil').autocomplete({
		source : './js/listeVille.php',
		minLength: 3,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
});