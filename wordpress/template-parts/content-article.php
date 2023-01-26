<article class="article__post <?php echo $args['class']; ?>">
  <a href="<?php the_permalink()?>" class="article__box">
      <?php if ($args['article__featured']) {
        ?>
        <div class="article__featured">
          <span class="article__featured-circle"></span>
          <span class="article__featured-text">Featured</span>
        </div>
        <?php
      } ?>

    <div class="article__image">
      <?php the_post_thumbnail()?>
    </div>
    <div class="article__content">
      <div class="article__header">
        <span class="article__category">
          <?php 
          $category = get_the_category($post->ID);
          echo $category->term_id;?>
        </span>
        <span class="article__date"><?php the_date('F d, Y')?></span>
      </div>
      <div class="article__body">
        <span class="article__title"><?php the_title()?></span>
        <?php if ($args['article__excerpt']) {
          ?>
          <span class="article__excerpt"><?php the_excerpt();?></span>
          <?php
        }?>
      </div>
        <?php if (!$args['article__excerpt']) {
          ?>
          <span class="article__link">Read more<img src="<?php echo get_template_directory_uri()?>/images/article-arrow.svg" alt=""></span>
          <?php
        }?>
      
    </div>
  </a>
</article>

