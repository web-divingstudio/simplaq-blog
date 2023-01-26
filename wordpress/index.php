<?php get_header();?>
<main class="page">
  <section class="head__section">
    <div class="head__container">
      <div class="head__block-text">
        <h1 class="head__title">Explore free resources to help you succeed in your shopping centre marketing</h1>
        <h2 class="head__subtitle">From guides, articles and case studies to shopping center success stories. All
          gathered here to help you improve the overall experience and performance of your shopping place.</h2>
      </div>
      <?php echo get_template_part( 'template-parts/content', 'article',['class'=>'head__block-article', 'article__featured'=>true, 'article__excerpt'=>false]); ?>
    </div>
  </section>
  <section class="blog__section">
    <div class="blog__container">
      <div class="blog__articles">
        <?php echo get_template_part( 'template-parts/content', 'article',['class'=>'blog__article', 'article__featured'=>false, 'article__excerpt'=>false]); ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>