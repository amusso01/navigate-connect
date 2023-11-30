<?php 
$address = $fields['address'];
$phone = $fields['phone'];
$email = $fields['email'];

?>


<section class="block-contact">
  <div class="content-block">
    <div class="block-contact__wrapper">
      <h2>Contact details</h2>
      <div class="block-contact__grid">
        <div class="address-wrapper">
          <div class="icon"><i><?= get_template_part( 'svg-template/svg', 'location' ) ?></i></div>
          <div class="address">
            <?= $address ?>
          </div>
        </div>
  
        <div class="phone">
          <p><i><?= get_template_part( 'svg-template/svg', 'phone' ) ?></i><a href="<?= $phone ?>"><?= $phone ?></a></p>
        </div>
  
        <div class="email">
          <p><i><?= get_template_part( 'svg-template/svg', 'email' ) ?></i><a href="<?= $email ?>"><?= $email ?></a></p>
        </div>
      </div>
    </div>
  </div>
</section>