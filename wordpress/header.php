<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head();?>
</head>

<body>
  <div class="wrapper">
    <header class="header">
  <div class="header__container">
    <div class="navbar">
      <div class="brand">
        <a href="https://simplaq.com/">
          <img src="<?php echo get_template_directory_uri()?>/images/header/logo.svg" alt="">
        </a>
      </div>
      <div class="navmenu">
        <div class="burger-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <nav class="navigation">
          <ul class="nav-list">
            <li class="nav-item"><a href="#overview" class="nav-link">Overview</a></li>
            <li class="nav-item"><a href="#solutions" class="nav-link">Solutions</a></li>
            <li class="nav-item"><a href="#opportunities" class="nav-link">Opportunities</a></li>
            <li class="nav-item"><a href="#benefits" class="nav-link">Benefits</a></li>
            <li class="nav-item"><a href="#contacts" class="nav-link">Contact</a></li>
          </ul>
          <div class="socials__header">
              <?php echo get_template_part( 'template-parts/content', 'social-block', ['position'=>'header']); ?>
            <a href="https://simplaq.com/#contacts" class="btn btn-demo">Get a demo</a>
          </div>
        </nav>

      </div>
      <div class="btn-block">
        <a href="https://simplaq.com/#contacts" class="btn btn-demo">Get a demo</a>
        <a href="#" class="btn btn-gradient lets">Let’s Talk</a>
      </div>
    </div>
  </div>
</header>