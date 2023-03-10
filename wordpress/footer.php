  <?php echo get_template_part( 'template-parts/content', 'lets-modal'); ?>
  <?php echo get_template_part( 'template-parts/content', 'send-modal'); ?>

    <footer class="footer">
      <div class="footer__container">
        <div class="footer__header">
          <?php echo get_template_part( 'template-parts/content', 'brand'); ?>
          <?php echo get_template_part( 'template-parts/content', 'btn-block'); ?>
        </div>
        <div class="footer__body">
          <div class="footer__nav">
            <div class="nav-box"><a href="https://simplaq.com/#overview" class="nav-link">Overview</a> <a href="https://simplaq.com/#solutions"
                class="nav-link">Features</a> <a href="https://simplaq.com/#benefits" class="nav-link">Benefits</a></div>
            <div class="nav-box"><a href="https://simplaq.com/#opportunities" class="nav-link">Insights</a> 
            <a href="<?php echo home_url(); ?>" class="nav-link">Blog</a>
            <a href="https://simplaq.com/#contacts" class="nav-link">Contact</a></div>
            <div class="nav-box">
              <a href="#" class="support"><img src="<?php echo get_template_directory_uri()?>/images/footer/Messages.svg" alt="">
                <p>Customer <span>support</span> and help 24 / 7</p>
              </a>
            </div>
          </div>
          <div class="subscribe">
            <div class="subscribe__block">
              <h3 class="subscribe__title">Get exclusive offers and weekly updates</h3>
              <form enctype="multipart/form-data" method="post" id="form" onsubmit="send(event, '<?php echo get_template_directory_uri()?>/send-subscribe.php')">
                <label for="email-subscribe"><img src="<?php echo get_template_directory_uri()?>/images/footer/email.svg" alt="">
                  <input type="email" name="email-subscribe" id="email-subscribe" placeholder="Email" autocomplete="off"required>
                </label>
                <button type="submit" class="subscribe-btn">Subscribe</button>
              </form>
              <!--  echo do_shortcode('[contact-form-7 id="32" title="subscribe"]');?> -->
            </div>
            <div class="follow__block">
              <h3 class="subscribe__title">Follow US</h3>
              <?php echo get_template_part( 'template-parts/content', 'social-block', ['position'=>'footer']); ?>
            </div>
          </div>
        </div>
        <div class="footer__block">
          <div class="copy">Simplaq | <span>All rights reserved. ?? 2022</span></div>
          <div class="link"><a href="#">Privacy & terms</a> <a href="#">Terms of Service</a></div>
        </div>
      </div>
    </footer>
  </div>
<?php wp_footer();?>
</body>

</html>