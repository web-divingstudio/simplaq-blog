<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head();?>
  <script charset=“utf-8” type=“text/javascript” src=“//js-eu1.hsforms.net/forms/embed/v2.js”></script>
  <script>
  hbspt.forms.create({
  region: “eu1",
  portalId: “26899523”,
  formId: “4bc4f47b-56ea-4314-926f-c9b913a1b4f3"
  });
  </script>
  
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <div class="header__container">
        <div class="navbar">
          <?php echo get_template_part( 'template-parts/content', 'brand'); ?>
          <div class="navmenu">
            <div class="burger-btn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="navigation">
              <ul class="nav-list">
                <li class="nav-item"><a href="https://simplaq.com/#overview" class="nav-link">Overview</a></li>
                <li class="nav-item"><a href="https://simplaq.com/#solutions" class="nav-link">Solutions</a></li>
                <li class="nav-item"><a href="https://simplaq.com/#opportunities" class="nav-link">Opportunities</a></li>
                <li class="nav-item"><a href="https://simplaq.com/#benefits" class="nav-link">Benefits</a></li>
                <li class="nav-item"><a href="<?php echo home_url(); ?>" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="https://simplaq.com/#contacts" class="nav-link">Contact</a></li>
              </ul>
              <div class="socials__header">
                  <?php echo get_template_part( 'template-parts/content', 'social-block', ['position'=>'header']); ?>
                <a href="https://simplaq.com/#contacts" class="btn btn-demo">Get a demo</a>
              </div>
            </nav>

          </div>
          <?php echo get_template_part( 'template-parts/content', 'btn-block'); ?>
        </div>
      </div>
      <?php
      if(is_single()){
        ?>
        <div class="progress-bar"></div>
        <?php
      }
      ?>
    </header>