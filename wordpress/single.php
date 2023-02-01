<?php get_header();?>
<main class="page">
  <div data-observ></div>
  <div class="single__page">
    <div class="single__container">
      <div class="single__content">
        <h1 class="single__title"><?php the_title();?></h1>
        <div class="single__header">
          <div class="single__author">
            <div class="single__author-avatar">
              <?php echo get_avatar( get_the_author_meta('user_email'), 32 );?>
            </div>
            <div class="single__author-name"><?php echo get_the_author_meta('user_firstname'); echo " "; echo get_the_author_meta('user_lastname'); ?></div>
          </div>
          <div class="single__date"><span class="single__post-status">Published: </span><span
              class="single__post-date"><?php the_time('F d, Y')?></span></div>
        </div>
        <pre>
        </pre>
        <div class="single__body">
          <?php the_content()?>
        </div>
      </div>
    </div>
  </div>
  
        <?php		
        $cat = get_the_category();
        $catname = $cat->name;
        $id = get_the_ID();
        global $post;
        $query = new WP_Query( [
          'post_type'    => 'post',
          'posts_per_page' => 3,
          'category_name' => $catname,
          'post__not_in' => [$id],
          'orderby'      => 'date',
          'order'        =>  'DESC',
          
        ] );
        if ( $query->have_posts() ) {
          ?>
      <div class="single__blog">
        <div class="single__container">
          <h5 class="single__blog-subtitle">Want to learn more?</h5>
          <h2 class="single__blog-title">Articles we recommend</h2>
          <div class="blog__articles">
          <?
          while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part( 'template-parts/content', 'article',['class'=>'single__article', 'article__featured'=>false, 'article__excerpt'=>true]);
          }
          ?>
          </div>
          <a href="<?php echo home_url(); ?>" class="single__blog-btn">Back to Blog</a>
        </div>
      </div>
          <?php
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>
</main>
<?php get_footer();?>