<?php get_header();?>
<main class="page">
  <section class="head__section" data-aos="fade-up" data-aos-duration="1000">
    <div class="head__container">
      <div class="head__block-text">
        <h1 class="head__title"><?php the_field('title')?></h1>
        <h2 class="head__subtitle"><?php the_field('subtitle')?></h2>
        <p class="head__text"><?php the_field('text')?></p>
        <div class="subscribe">
            <div class="subscribe__block">
              <form enctype="multipart/form-data" method="post" id="form" onsubmit="send(event, '<?php echo get_template_directory_uri()?>/send-subscribe.php')">
                <label for="email-subscribe"><img src="<?php echo get_template_directory_uri()?>/images/footer/email.svg" alt="">
                  <input type="email" name="email-subscribe" id="email-subscribe" placeholder="Email" autocomplete="off"required>
                </label>
                <button type="submit" class="subscribe-btn btn-gradient btn">Subscribe</button>
              </form>
              <!--  echo do_shortcode('[contact-form-7 id="32" title="subscribe"]');?> -->
            </div>
          </div>
      </div>
      <?php		
        global $post;
        $query = new WP_Query( [
          'posts_per_page' => 1,
          'orderby'      => 'date',
          'order'        =>  'DESC',
          'tax_query' => array(
            array(
              'taxonomy' => 'featured-tax',
              'field'    => 'slug',
              'terms'    => 'featured'
            )
          )
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part( 'template-parts/content', 'article',['class'=>'head__block-article', 'article__featured'=>true, 'article__excerpt'=>false]);
          }
        }
        wp_reset_postdata(); 
        ?>
    </div>
  </section>
  <section class="blog__section">
    <div class="blog__container">
      <div class="blog__articles">
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => 12,
          'orderby'      => 'date',
          'order'        =>  'DESC',
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part( 'template-parts/content', 'article',['class'=>'blog__article', 'article__featured'=>false, 'article__excerpt'=>false]);
          }
        }
        wp_reset_postdata(); 
        ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>