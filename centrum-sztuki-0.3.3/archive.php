<?php get_header(); ?>
<div id="main-container">
	<section id="content-container">
    	<header class="page-header">
        	<h1 class="page-title">
            	<?php if( is_day() ) : ?>
                	Archiwum dzienne dla <span><?php echo get_the_date(); ?></span>
                <?php elseif ( is_month() ) : ?>
                	Archiwum miesięczne dla <span><?php echo get_the_date('F Y'); ?></span>
                <?php elseif ( is_year() ) : ?>
                	Archiwum rooczne dla <span><?php echo get_the_date('Y'); ?></span>
                <?php elseif ( is_category() ) : ?>
                	<?php single_cat_title('Aktualnie przeglądane '); ?>
                <?php elseif ( is_tag() ) : ?>
                	<?php single_tag_title('Aktualnie przeglądane '); ?>
                <?php else : ?>
                	Archiwa
                <?php endif; ?>
            </h1>
        </header>
        
        <?php
			//Początek pętli
			while( have_posts() ) : the_post();
			
			//Pobranie odpowiedniego typu treści
			get_template_part('content', get_post_format() );
			
			//Koniec pętli
			endwhile; 
		?>
    </section><!--#content-container-->

	<?php get_sidebar(); ?>
</div><!--#main-container-->
<?php get_footer(); ?>