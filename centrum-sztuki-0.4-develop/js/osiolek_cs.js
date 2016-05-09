// PODSTAWOWY PLIK SKRYPTÓW DLA SZABLONU CENTRUM SZTUKI OD WERSJI 0.4

var $ = jQuery.noConflict();

jQuery(document).ready(function(){
	//włączenie etykietek ekranowych
	$('[title]').tooltip({
		track: true,
	});
}); //koniec funkcji ready