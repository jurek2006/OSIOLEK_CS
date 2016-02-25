<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    <?php  
		//Tytuł - ustawiany na podstawie tego, co jest otwarte, tutaj dodawany jest początek do tytułu
		if (96 == $post->post_parent) {
		//jeśli jest to dowolna podstrona wydarzeń (a właściwie kategorii wydarzeń)
			$dopisek = 'Wydarzenia - ';
		}
		else if(get_the_ID()==237){
		//jeśli są to wszystkie zajęcia - podstrona z Edukacja
			$dopisek = 'Edukacja - ';
		}
		else if(497 == $post->post_parent) {
		//jeśli jest to podstrona z Edukacja - poza "wszystkie zajęcia"
			$dopisek = 'Edukacja - zajęcia ';
		}
		
		if ( is_home () ) {
		//strona główna 
            bloginfo( 'name' ); 
        } elseif ( is_archive() ) {
		//archiwum
            single_cat_title(); echo ' &bull; ' ; bloginfo( 'name' ); 
        } elseif ( is_singular() ) { 
		//pojedynczy wpis
            echo $dopisek; single_post_title(); echo ' &bull; ' ; bloginfo( 'name' ); 
        } else { 
		//pozostałe, czyli strona
            wp_title( '', true ); echo ' &bull; ' ; bloginfo( 'name' ); 
        }

	?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
	<!--Wczytanie styli CSS odbywa się w functions za pomocą mechanizmu WordPress-->
    
    <link rel="pingback" href="<?php bloginfo('pingbck_url'); ?>" />
    
    <!--***** META TAG FOR DO NOT LIE-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--***** SCRIPT TO HELP OLD IE UNDERSTAND HTML5 AND MEDIA QUERIES-->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
  

    
    <?php 
		// Dodanie do kolejki kodu JavaScript dla zakorzenionych komentarzy, jeśli są włączone
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );
			
	
		//Wywołanie funkcji wp_head() powinno znajdować się przed znacznikiem zamykającym nagłówek
		wp_head(); 
	?>
    <!--Czcionka MAGRA-->
    <link href='http://fonts.googleapis.com/css?family=Magra:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    
	
</head>

<body> 

<!-- Górne menu nawigacyjne przy użyciu bootstrap 
		Na podstawie https://github.com/twittem/wp-bootstrap-navwalker/
 -->



<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
<!-- Brand and toggle get grouped for better mobile display --> 

	<div class="container">
		<div class="col-xs-12">
		  <div class="navbar-header"> 
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
		      <span class="sr-only">Toggle navigation</span> 
		      <span class="icon-bar"></span> 
		      <span class="icon-bar"></span> 
		      <span class="icon-bar"></span> 
		    </button> 
		    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
		  </div> 
		  <!-- Collect the nav links, forms, and other content for toggling --> 
		  <div class="collapse navbar-collapse navbar-ex1-collapse"> 

				 <?php
				 	$uzywane_menu = 'top-navigation';
				 	if (current_user_can( UPR_MENU_USER )){
						//jeśli jest zalogowany użytkownik o uprawnieniach do publikacji postów (co najmniej Autor) to wyświetlane jest specjalne menu główne zamiast standardowego
						$uzywane_menu = 'top-user-navigation';
					}

		            wp_nav_menu( array(
		                'menu'              => $uzywane_menu,
		                'theme_location'    => $uzywane_menu,
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
		        		'container_id'      => 'bs-example-navbar-collapse-1',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
		  </div>
		</div>
	</div>
</nav>





<div id="header-wrap" class="container">
        	<header class="clearfix">
            	
               
            </header>
</div><!-- #header-wrap-->


<!--DIVY przeniesione do plików szablonowych jak index.php, wydarzenia.php, wydarzenia-single.php, adresy.php-->          
<!--<div id="main-wrap">
	<div id="main-container" class="clearfix">-->


