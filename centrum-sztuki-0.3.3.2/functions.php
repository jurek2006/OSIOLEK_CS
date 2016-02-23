<?php
	
	// funkcja i dodanie akcji dodatkowe
	//pozwala dopisywać nowe style w style.css motywu potomnego
	//zbędne przy scalaniu do nowej wersji motywu nadrzędnego
	function centrumSztuki_enqueue_child_style() {
		wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'centrumSztuki_enqueue_child_style' );
	
	/*if ( is_page_template( 'template-registration-page.php' ) ) {
    wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.min.css' );*/
	
	//---------------------------------------------------------------------------------------------------------
	//stała określa, jakie uprawnienia musi mieć użytkownik do strony importu projekcji
	//(używane przy wyświetlaniu treści strony w szablonie ale także do dołączania skryptu .js)
	define("UPR_IMPORT_PROJEKCJI", "publish_posts");
	
	//stała określająca uprawnienia potrzebne do dostępu do strony kino-zarządzanie (kino-zarzadzanie.php)
	define("UPR_KINO_ZARZADZANIE", "publish_posts"); 
	
	//uprawnienia potrzebne do wyświetlania menu top-user-navigation zamiast top-navigation
	define("UPR_MENU_USER", "publish_posts"); 


	$tlumaczenieStatusuPostow = Array("publish" => "Opublikowane", "draft" => "Szkic", "pending" => "Oczekuje na przeglad", "future" => "Zaplanowana publikacja");
	
	//jQuery UI
	function add_jquery_ui() {
		wp_enqueue_script( 'jquery-ui-core' );
		//wp_enqueue_script( 'jquery-ui-widget' );
//		wp_enqueue_script( 'jquery-ui-mouse' );
//		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
//		wp_enqueue_script( 'jquery-ui-slider' );
//		wp_enqueue_script( 'jquery-ui-tabs' );
//		wp_enqueue_script( 'jquery-ui-sortable' );
//		wp_enqueue_script( 'jquery-ui-draggable' );
//		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
//		wp_enqueue_script( 'jquery-ui-resize' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		//wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
	}
	add_action( 'wp_enqueue_scripts', 'add_jquery_ui' );
	
	//dodanie plików stylu jQueryUI z serwerów Google
	wp_enqueue_style(	'plugin_name-admin-ui-css',
						'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css',
						false,
						PLUGIN_VERSION,
						false);
	
	//dołączenie skryptu visualticket_import.js jeśli uzytkownik ma uprawnienia na poziomie
	//wystarczającym do wyświetlenia strony Import projekcji i jeśli jest na tej stronie
	//a więc szablon aktualnej strony to 
	function add_my_script() {
		//spolszczenie datepicker z jQueryUI
		//wp_register_script('datepicker_pl', get_stylesheet_directory_uri().'/visualticket_import/datepicker-pl.js', array( 'jquery' ));

		//mój skrypt importu terminów-projekcji z VisualTicket
		wp_register_script('visualticket_import', get_stylesheet_directory_uri().'/visualticket_import/visualticket_import.js', array( 'jquery' ));
		if (current_user_can( UPR_IMPORT_PROJEKCJI ) && is_page_template('import-projekcji.php')){
			//wp_enqueue_script('datepicker_pl');
			wp_enqueue_script('visualticket_import');
		}
	}  
	add_action( 'wp_enqueue_scripts', 'add_my_script' );

	function my_enqueue($hook) {
	// dodanie skryptu w menu admin, jeśli jest to strona post-new.php lub post.php (czyli strona dodawania noweg lub edycji dowolnego typu postu)
	    if (( 'post-new.php' != $hook )&&( 'post.php' != $hook )) {
	        return;
	    }

	    wp_enqueue_script( 'my_custom_script', get_stylesheet_directory_uri(). '/admin_js/post_dodawanie_edycja.js' );
	}
	add_action( 'admin_enqueue_scripts', 'my_enqueue' );

	function dodajPaginacje($pods){
	// Funkcja dodająca zaawansowaną paginację pods z etykietami w j.pol.
	// parametr $pods to pod dla którego tworzona jest paginacja

        echo $pods->pagination( array(  'type' => 'advanced',
                                        'first_text' => '&laquo;Pierwsza strona',
                                        'prev_text' => '&lsaquo;Poprzednia',
                                        'next_text' => 'Następna&rsaquo;',
                                        'last_text' => 'Ostatnia strona&raquo;'
                                        ) );
	}

?>