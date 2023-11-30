<?php 
$user = wp_get_current_user();
?>

<section class="component-welcome">
  <div class="content-block">
    <div class="component-welcome__grid">

      <div class="component-welcome-buble buble">
        <div class="date">
          <p><i><?php get_template_part( 'svg-template/svg', 'calendar' ) ?></i><?= date('d/m/Y') ?></p>
        </div>

        <p class="user">Welcome <?= $user->display_name .'!'?></p>

        <div class="links">
          <a class="btn" href="<?= site_url('/create-deal') ?>"><i><?php get_template_part( 'svg-template/svg', 'plus' ) ?></i>Add Deal <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
          <a class="btn" href="<?= site_url('/create-an-investor-mandate') ?>"><i><?php get_template_part( 'svg-template/svg', 'plus' ) ?></i>Add Investor Mandate<i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
        </div>

      </div>  

      <div class="component-member-buble buble buble-colors">
        <div class="svg">
        <?php get_template_part( 'svg-template/svg', 'members' ) ?>
        </div>
        <h3>Members</h3>
        <p>Navigate network Members</p>

        <a class="btn"  href="<?= site_url( '/members' ) ?>"><i><?php get_template_part( 'svg-template/svg', 'plus' ) ?></i> View Members <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
      </div>  

      <div class="component-service-buble buble  buble-colors">
        <div class="svg">
        <?php get_template_part( 'svg-template/svg', 'services' ) ?>
        </div>
        <h3>Service Providers</h3>
        <p>Service Providers network</p>

        <a class="btn"  href="<?= site_url( 'archives/service-provider' ) ?>"><i><?php get_template_part( 'svg-template/svg', 'plus' ) ?></i> View service Providers <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>

      </div>  

    </div>
  </div>
</section>