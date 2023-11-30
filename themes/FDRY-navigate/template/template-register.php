<?php 
/* Template Name: Register interest
Template Post Type: page */ 

// SAFE CHECK USER LOGED IN
// if ( !is_user_logged_in() ) {
//    return;
// }

get_header();


?>

<?php 
$infoTitle = '';
$infoExcerpt = '';
$sectors = [];

if($_GET){
  $post_id = $_GET['id'];
  $post_type = $_GET['post_type'];

  $infoTitle = get_the_title( $post_id );
  $infoExcerpt = get_the_excerpt( $post_id );

  $infoTermsSector = get_the_terms( $post_id , 'sector' );

  if ( $infoTermsSector != null ){
    foreach( $infoTermsSector as $term ) {
      $cc = get_field('color-code' , $term);
      $sectors[$cc] = $term->name;
    }
  }
}

// USER INFO and EMAIL
$current_user = wp_get_current_user();

if($_POST){
  debug_ppa($_POST);
};

?>

<main role="main" class="site-main register-interest-main">

  <div class="register-interest__grid">

    <div class="register-interest__info">

      <div class="info-buble">
        <h3><?= $infoTitle ?></h3>
        <p class="excerpt"><?= $infoExcerpt ?></p>
        <div class="service-deatails">
        <p>Sector(s)</p>
          <div class="sectors">
            <i><?php get_template_part( 'svg-template/svg', 'sectors' ) ?></i>
            <?php foreach($sectors as $key => $sector) : ?>
              <div class="sector-buble" style="background-color: <?= $key ?>;">
                <?= $sector ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>

    </div>

    <div class="register-interest__form">
        <h3>Contact</h3>

        <form id="registerInterest" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="fdry-form-row">
            <div class="fdry-form-item">
              <label for="firstName">First Name</label>
              <input disabled value="<?= $current_user->user_firstname ?>" type="text" id="firstName" name="firstName">
              <input hidden value="<?= $current_user->user_firstname ?>" type="text" id="firstName" name="firstName">
            </div>
            <div class="fdry-form-item">
              <label for="lastName">Last Name</label>
              <input disabled value="<?= $current_user->user_lastname ?>" type="text" id="lastName" name="lastName">
              <input hidden value="<?= $current_user->user_lastname ?>" type="text" id="lastName" name="lastName">
            </div>
          </div>
          <div class="fdry-form-row">
            <div class="fdry-form-item">
              <label for="phone">Contact Number</label>
              <input disabled value="<?= $current_user->ID ?>" type="text" id="phone" name="phone">
              <input hidden value="<?= $current_user->ID ?>" type="text" id="phone" name="phone">
            </div>
            <div class="fdry-form-item">
              <label for="email">Contact Email</label>
              <input disabled value="<?= $current_user->user_email ?>" type="email" id="email" name="email">
              <input hidden value="<?= $current_user->user_email ?>" type="email" id="email" name="email">
            </div>
          </div>
          <label for="message">Message</label>
          <textarea name="message" id="message" rows="10"></textarea>

          <input hidden value="<?= $infoTitle ?>" type="text" name="assetsTitle" >
          <input hidden value="<?= get_the_permalink($post_id) ?>" type="text" name="assetsUrl" >

          <button role="button" class="btn">Submit</button>
        </form>
    </div>

  </div>


</main><!-- #main -->


<?php
get_footer();