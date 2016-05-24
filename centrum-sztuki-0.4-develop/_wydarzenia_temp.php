<!-- Elementy - karuzela i "trzy ikony" do dodania w wydarzenia.php -->

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

<!-- Trzy kolumny tekstu pod karuzelą "trzy ikony"-->
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