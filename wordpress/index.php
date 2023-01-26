<?php get_header();?>
<main class="page">
  <section class="head__section">
    <div class="head__container">
      <div class="head__block-text">
        <h1 class="head__title"><?php the_field('title')?></h1>
        <h2 class="head__subtitle"><?php the_field('title')?></h2>
      </div>
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => 1,
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part( 'template-parts/content', 'article',['class'=>'head__block-article', 'article__featured'=>true, 'article__excerpt'=>false]);
          }
        }
        wp_reset_postdata(); // Сбрасываем $post
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
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part( 'template-parts/content', 'article',['class'=>'blog__article', 'article__featured'=>false, 'article__excerpt'=>false]);
          }
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>