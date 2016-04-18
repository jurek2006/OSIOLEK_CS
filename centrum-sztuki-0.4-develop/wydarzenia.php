<?php
/*
Template Name: Wydarzenia
Description: Obsługuje stronę listy wydarzeń stylu Centrum Sztuki w Oławie korzystając z pods wydarzenia. (Usunięto obsługę kategorii wydarzeń)
Pojedyncze wydarzenie obsługiwane są przez wydarzenia_single.php
*/

get_header(); ?>

<!-- Karuzela testowa -->

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Nie znajduje się w #main-wrap bo w przeciwieństwie do niego ma być ustawiana na całą szerokość strony -->
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img class="first-slide" src="<?php echo get_template_directory_uri() ?>/carousel_test/carousel_test_1.jpg" alt="First slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Example headline.</h1>
                  <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
              </div>
            </div>
            <div class="item">
              <img class="second-slide" src="<?php echo get_template_directory_uri() ?>/carousel_test/carousel_test_2.jpg" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Another example headline.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
              </div>
            </div>
            <div class="item">
              <img class="third-slide" src="<?php echo get_template_directory_uri() ?>/carousel_test/carousel_test_3.jpg" alt="Third slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>One more for good measure.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- /.carousel -->

        <!-- Koniec karuzeli -->

<div id="main-wrap" class="container">

    

	<div id="main-container" class="row">

        <!-- Trzy kolumny tekstu pod karuzelą -->
          <div class="row wyrozniki">
            <div class="col-sm-4">
              <img class="img-circle" src="<?php echo get_template_directory_uri().'/img/pegaz_kwadrat.jpg' ?>" alt="Generic placeholder image" width="140" height="140">
              <h2>Wydarzenia kulturalne</h2>
              <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
            <div class="col-sm-4">
              <img class="img-circle" src="<?php echo get_template_directory_uri().'/img/pegaz_kwadrat.jpg' ?>" alt="Generic placeholder image" width="140" height="140">
              <h2>Kino Odra</h2>
              <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
            <div class="col-sm-4">
              <img class="img-circle" src="<?php echo get_template_directory_uri().'/img/pegaz_kwadrat.jpg' ?>" alt="Generic placeholder image" width="140" height="140">
              <h2>Zajęcia edukacyjne</h2>
              <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
    
    	<section id="content-container" class="col-xs-12 col-lg-9">

        <h1>Wydarzenia kulturalne Centum Sztuki w Oławie</h1>
		<?php
			if (!is_single()){
			//Na wszelki wypadek sprawdza czy to jest lista wydarzeń
				

                $params = array(    'limit' => -1,
                                    'where'   => '(data_i_godzina_wydarzenia.meta_value > NOW()) OR (dzien_zakonczenia.meta_value > NOW())',
                                    'orderby'  => 'data_i_godzina_wydarzenia.meta_value');

				$pods = pods( 'wydarzenia', $params );
                //loop through records
                if ( $pods->total() > 0 ) {
					//jeśli znaleziono wydarzenia spełniające określone kryteria - następuje wyświetlenie ich listy
                    while ( $pods->fetch() ) {
                        //Put field values into variables
                        $title = $pods->display('name');
						$permalink = $pods->field('permalink' );
                        $picture = $pods->field('miniatura');
						
						//pobieranie koloru tła na podstawie lokalizacji
						$kolor_tla_naPodstLokalizacji = $pods->field('lokalizacje.adres.kolor');
						$kolor_tla_naPodstLokalizacji = $kolor_tla_naPodstLokalizacji[0];
						
						
						//Tworzenie linijki wpisu terminu
						$data_i_godzina_wydarzenia = $pods->display('data_i_godzina_wydarzenia');
						$dzien_rozpoczecia = $pods->display('dzien_rozpoczecia');
						$dzien_zakonczenia = $pods->display('dzien_zakonczenia');
						$termin_opisowy = $pods->display('termin_opisowy');
						$wystawa_z_wernisazem = $pods->field('wystawa_z_wernisazem');
						$alias_wernisazu = $pods->display('alias_wernisazu');
						
						$termin = pobierzTerminWydarzenia($data_i_godzina_wydarzenia, $dzien_rozpoczecia, $dzien_zakonczenia, $termin_opisowy, $alias_wernisazu, $wystawa_z_wernisazem);
						
						$miniatura = $pods->display('miniatura');
						$lokalizacje = $pods->field('lokalizacje.name');
						$lokalizacje = $lokalizacje[0];

						$lokalizacje_adres = $pods->field('lokalizacje.adres.adres');
						$lokalizacje_adres = $lokalizacje_adres[0];
						
						$lokalizacje_slug = $pods->field('lokalizacje.slug');
						

						$kategorie_name = $pods->field('wydarzenie_kategorie.name');
						$kategorie_slug = $pods->field('wydarzenie_kategorie.slug');
						
						$krotki_opis = $pods->field('krotki_opis');
						
						$inny_komunikat_o_biletach = $pods->display('inny_komunikat_o_biletach');
						$opcje_sprzedazy = $pods->field('opcje_sprzedazy');
						$id_w_sprzedazy_online = $pods->field('id_w_sprzedazy_online');
						$dzien_publikacji_odnosnika_do_biletow = $pods->field('dzien_publikacji_odnosnika_do_biletow');
						$godzina_publikacji_odnosnika_do_biletow = $pods->field('godzina_publikacji_odnosnika_do_biletow');
						if(!empty($dzien_publikacji_odnosnika_do_biletow) && $godzina_publikacji_odnosnika_do_biletow==0){
							//jeśli wybrano dzień publikacji odnośnika, a nie wybrano godziny (wybrano 00:00) to wstawiana jest standardowa 10:00
							$godzina_publikacji_odnosnika_do_biletow = '10:00';
						}
						
						$home_url = get_home_url();
						
						
						            ?>
              <article class="wydarzenie">
              <a class="czytajWiecej" href="<?php echo esc_url( $permalink); ?>">
              <div class="odnosnik">

                <div class="lewa">
                <!-- Lewa strona wpidu wydarzenia na liście wydarzeń -->

                  <h2 class="tytul"> <?php _e( $title , 'PP2014' ); ?> </h2> <!-- Tytuł wydarzenia -->

                  <!-- Kategorie wydarzenia -->
                  <div class="kategorie">
                    <?php for($i=0; $i < count($kategorie_name); $i++){
                        if(!empty($kategorie_slug[$i]))
                        {
                            // echo '<a href="'.home_url().'/kategorie_wydarzen/'.$kategorie_slug[$i].'/" class="kategoria">'.$kategorie_name[$i].'</a> ';
                          echo $kategorie_name[$i];
                        }
                    }?>
                  </div> <!-- .lewa -->

                  <!-- Krótki opis wydarzenia -->
                  <div class="opis">
                      <?php echo $krotki_opis; ?>
                  </div>

                </div>

                <div class="prawa" style="background-color:<?php echo $kolor_tla_naPodstLokalizacji ?>">
                <!-- Prawa strona wpidu wydarzenia na liście wydarzeń -->
                <?php 

                    // Miniatura - thumb
                    //jeśli wydarzenie ma przypisaną miniaturę, to jest ona wyświetlana
                    if (( !is_null($picture) )&&(!empty($picture))){
                        echo wp_get_attachment_image( $picture['ID'],'thumbnail', false, $attr='class=thumb' ); 
                    }
                    //jeśli wydarzenie nie ma przypisanej miniatury to jest wyświetlany standardowy obrazek pegaz_thumb.jpg
                    else{
                        echo '<img class="thumb" src="'.get_stylesheet_directory_uri().'/pegaz_thumb.png" />';    
                    }?>

                    <!-- Sekcja daty wydarzenia i lokalizacji (kolorowe tło na podstawie koloru lokalizacji wydarzenia) -->

                    <!-- ================================================================================================================== -->
                    <div class="termin">
                        <?php
                            if(!empty($termin_opisowy))
                            //jeśli jest to termin opisowy
                            {
                        ?>    <!--Zawartość div.termin-->
                                    
                                  <!-- TERMIN OPISOWY -->
                                  <div class="termin-opisowy">
                                      <p><?php echo $termin_opisowy ?></p>
                                  </div>
                                  <div class="termin-lokalizacja">
                                          <p><?php echo $lokalizacje; ?><br /><?php echo $lokalizacje_adres; ?></p>
                                  </div>

                                <!--Koniec zawartości div.termin-->
                        <?php
                            }//if(!empty($termin_opisowy))
                            else if(!empty($dzien_zakonczenia) && !empty($dzien_rozpoczecia))
                            //jeśli są wypełnione dzień zakończenia i dzień rozpoczęcia to jest to termin od - do
                            {
                        ?>
                                <!--Zawartość div.termin-->
                                    
                                      <!-- TERMIN OD-DO -->

                                    <div class="termin-dzien">

                                        <!-- Data początku wydarzenia -->
                                        <p><?php 
                                          echo 'Od '.zamienDzienTygodniaLiczbowyNaSlowny(pobieczCzescDaty('w',$dzien_rozpoczecia), TRUE).' ';
                                          echo '<span class="dzien">'.pobieczCzescDaty('j',$dzien_rozpoczecia).'</span> ';
                                          echo ZamienMiesiacLiczbowyNaSlownyOdmieniony(pobieczCzescDaty('m',$dzien_rozpoczecia)).' ';
                                          echo pobieczCzescDaty('Y',$dzien_rozpoczecia);
                                        ?></p>
                                    </div>
                                    <div class="termin-dzien">

                                        <!-- Data końca wydarzenia -->
                                        <p><?php 
                                          echo 'Do '.zamienDzienTygodniaLiczbowyNaSlowny(pobieczCzescDaty('w',$dzien_zakonczenia), TRUE).' ';
                                          echo '<span class="dzien">'.pobieczCzescDaty('j',$dzien_zakonczenia).'</span> ';
                                          echo ZamienMiesiacLiczbowyNaSlownyOdmieniony(pobieczCzescDaty('m',$dzien_zakonczenia)).' ';
                                          echo pobieczCzescDaty('Y',$dzien_zakonczenia);
                                        ?></p>

                                    </div>
                                    <div class="termin-lokalizacja">
                                        <p><?php echo $lokalizacje; ?><br /><?php echo $lokalizacje_adres; ?></p>
                                    </div>

                                  <!--Koniec zawartości div.termin-->
                        <?php
                            }//else if(!empty($dzien_zakonczenia) && !empty($dzien_rozpoczecia))
                            else if(!empty($dzien_rozpoczecia))
                            //jeśli jest wypełniony tylko $dzien_rozpoczecia, bez $dzien_zakonczenia to jest to wydarzenie jednodniowe
                            {
                        ?>
                            <!--Zawartość div.termin-->
                                
                                    <!-- TERMIN JEDNODNIOWY -->
                                    <div class="termin-dzien">

                                        <!-- Data początku wydarzenia -->
                                        <p><?php 
                                          echo zamienDzienTygodniaLiczbowyNaSlowny(pobieczCzescDaty('w',$dzien_rozpoczecia)).' ';
                                          echo '<span class="dzien">'.pobieczCzescDaty('j',$dzien_rozpoczecia).'</span> ';
                                          echo ZamienMiesiacLiczbowyNaSlownyOdmieniony(pobieczCzescDaty('m',$dzien_rozpoczecia)).' ';
                                          echo pobieczCzescDaty('Y',$dzien_rozpoczecia);
                                        ?></p>
                                    </div>

                                    <div class="termin-lokalizacja">
                                        <p><?php echo $lokalizacje; ?><br /><?php echo $lokalizacje_adres; ?></p>
                                    </div>

                            <!--Koniec zawartości div.termin-->
                        <?php
                            }//if(!empty($dzien_rozpoczecia))
                            else if(!empty($data_i_godzina_wydarzenia))
                            //jeśli nie wypełnione żadne powyższe brana jest pod uwagę $data_i_godzina_wydarzenia (zwykłe wydarzenie)
                            //sprawdzanie czy jest empty powinno być tu formalnością, bo nie da się dodać wydarzenia bez wypełnienia tego pola
                            {
                        ?>
                                <!--Zawartość div.termin-->

                                    <!-- TERMIN STANDARDOWY - z datą i godziną -->
                                
                                    <div class="termin-dzien">

                                        <!-- Data wydarzenia -->
                                        <p><?php 
                                          echo zamienDzienTygodniaLiczbowyNaSlowny(pobieczCzescDaty('w',$data_i_godzina_wydarzenia)).' ';
                                          echo '<span class="dzien">'.pobieczCzescDaty('j',$data_i_godzina_wydarzenia).'</span> ';
                                          echo ZamienMiesiacLiczbowyNaSlownyOdmieniony(pobieczCzescDaty('m',$data_i_godzina_wydarzenia)).' ';
                                          echo pobieczCzescDaty('Y',$data_i_godzina_wydarzenia);
                                        ?></p>
                                    </div>
                                    <div class="termin-godz">

                                        <!-- Godzina wydarzenia -->
                                        <p><?php
                                          echo 'godz: '; 
                                          echo '<span class="godziny">'.pobieczCzescDaty('G',$data_i_godzina_wydarzenia).'</span>';
                                          echo '<span class="hidden">:</span>'; //Ukryty span - gdy nie ma wczytanych stylów wyświetla : w godzinie 00:00
                                          echo '<span class="minuty">'.pobieczCzescDaty('i',$data_i_godzina_wydarzenia).'</span>';
                                        ?></p>

                                    </div>
                                    <div class="termin-lokalizacja">
                                        <p><?php echo $lokalizacje; ?><br /><?php echo $lokalizacje_adres; ?></p>
                                    </div>
                                <!--Koniec zawartości div.termin-->
                        <?php
                            }//else if(!empty($data_i_godzina_wydarzenia))
                            else
                            //jeśli nie jest to żaden ze znanych rodzajów terminów
                            {
                        ?>    <!--Zawartość div.termin-->
                                        <p>Błąd terminu</p>
                                <!--Koniec zawartości div.termin-->
                        <?php
                            }//else
                            
                        ?>
                    </div><!--.termin-->

                    <!-- ================================================================================================================== -->
                </div><!-- .prawa -->

              </div><!-- . -->

              </a>

              </article>


            <?php
					}//while ( $pods->fetch() )
				}//if ( $pods->total() > 0 )
				else{
				//jeśli nie znaleziono wydarzeń spełniających określone kryteria
					?>
                    <h2>Brak zaplanowanych wydarzeń z kategorii <?php echo $nazwa_kategorii ?>.</h2>
                    <p>W najbliższym czasie Centrum Sztuki w Oławie nie organizuje żadnych wydarzeń z kategorii <?php echo $nazwa_kategorii ?>.</p>
					<p>Zapraszamy do zapoznania się z ofertą naszych wydarzeń z innych kategorii:<br />

					<?php
						
						echo '<a href="'.home_url().'/">wszystkie kategorie</a> ';
						//wypisanie odnośników do wszystkich innych kategorii poza aktualnie otwartą (w której nic nie znaleziono)
						for($i = 0; $i < count($zdefiniowane_kategorie_wydarzen_nazwy); $i++)
						{
							if($zdefiniowane_kategorie_wydarzen_nazwy[$i] != $nazwa_kategorii)
							//jeśli dana kategoria nie jest kategorią dla której właśnie nie znaleziono żadnych wydarzeń to wyświetlany odnośnik do niej
							{
								echo '<a href="'.home_url().'/kategorie_wydarzen/'.$zdefiniowane_kategorie_wydarzen[$i].'/">'.$zdefiniowane_kategorie_wydarzen_nazwy[$i].'</a> ';
							}
						}//for($i = 0; $i < count($zdefiniowane_kategorie_wydarzen_nazwy); $i++)
					?>
                    </p>
					<?php
				}//else od if ( $pods->total() > 0 )
			}//if (!is_single())
			else{
				//Jeśli nie jest to lista wydarzeń zgłasza błąd. Plikiem odpowiadającym za wyświetlanie pojedynczych wydarzeń jest wydarzenia_single.php
				?>
                	<p>Błąd listy wydarzeń szablonu WYDARZENIA. Jeśli widzisz ten komunikat skontaktuj się z nami na adres <a href="mailto:js@kultura.olawa.pl">js@kultura.olawa.pl</a>. Dziękujemy za pomoc w ulepszaniu naszej strony.</p>
				<?php
			}//else od if (!is_single())
		?>
		</section><!-- #content-container -->
        <?php get_sidebar(); ?>
	</div><!-- #main-container -->       
</div><!--#main-wrap - koniec-->

<?php get_footer(); ?>