<div class="lets-modal">
  <div class="lets__container">
    <div class="modal-header">
      <div class="btn-close"><span></span><span></span></div>
    </div>
  </div>
  <div class="contacts">
    <div class="lets__container">
      <div class="contacts__block">
        <div class="contacts__form">
          <h2 class="modal-title">Let’s Talk</h2>
          <div class="contacts__link">
            <div class="contacts__box"><img src="<?php echo get_template_directory_uri()?>/images/modal/mail.svg" alt="">
              <div class="text">
                <h3 class="title">Email</h3><a href="mailto:hello@simplaq.com">hello@simplaq.com</a>
              </div>
            </div>
            <div class="contacts__box"><img src="<?php echo get_template_directory_uri()?>/images/modal/phone.svg" alt="">
              <div class="text">
                <h3 class="title">Phone number</h3><a href="tel:+17606604704">Call the shop</a>
              </div>
            </div>
          </div>
          <form enctype="multipart/form-data" method="post" id="form" onsubmit="send(event, 'send-lets.php')">
            <div class="input__block"><label for="your-name"><img
                  src="<?php echo get_template_directory_uri()?>/images/form/user.svg" alt=""> <input type="text"
                  name="your-name" id="modal-your-name" placeholder="Full name"></label> <label for="email"><img
                  src="<?php echo get_template_directory_uri()?>/images/form/email.svg" alt=""> <input type="email" name="email"
                  id="modal-email" placeholder="Email" required></label> <label for="company"><img
                  src="<?php echo get_template_directory_uri()?>/images/form/company.svg" alt=""> <input type="text"
                  name="company" id="modal-company" placeholder="Company name"></label> <label
                for="modal-phone"><img src="<?php echo get_template_directory_uri()?>/images/form/phone.svg" alt=""> <input
                  type="text" name="phone" id="modal-phone" placeholder="Phone number" required></label> <label
                for="modal-message" class="message"><img src="<?php echo get_template_directory_uri()?>/images/form/message.svg"
                  alt=""> <textarea name="modal-message" id="modal-message"
                  placeholder="Message"></textarea></label></div>
            <div class="checkout__block"><label for="modal-policy"><input type="checkbox" name="policy"
                  id="modal-policy" required> <span>I accept</span> <a href="#">Privacy policy</a></label> <label
                for="modal-terms"><input type="checkbox" name="terms" id="modal-terms" required> <span>I
                  accept</span> <a href="#">Terms & Conditions</a></label> <label for="modal-offers"><input
                  type="checkbox" name="offers" id="modal-offers"> <span>I want to receive commercial offers from
                  mall & stores</span></label></div><button type="submit"
              class="btn btn-gradient btn-submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>