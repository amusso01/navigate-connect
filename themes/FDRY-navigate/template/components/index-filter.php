<?php
/**
 * Index filter
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

 
?>
<section class="index-filter" id="library">

  <div class="index-filter__wrapper">

    <div class="index-filter__inner content-block">

      <div class="index-nav">
        <form method="get">
          <select class="btn" name="search_month" id="search_month">
              <?php 
              $months = array(
                  '01' => 'January',
                  '02' => 'February',
                  '03' => 'March',
                  '04' => 'April',
                  '05' => 'May',
                  '06' => 'June',
                  '07' => 'July',
                  '08' => 'August',
                  '09' => 'September',
                  '10' => 'October',
                  '11' => 'November',
                  '12' => 'December',
              );
              foreach ($months as $value => $label) {
                  $selected = ($value == $_GET['search_month']) ? 'selected' : '';
                  echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
              }
              ?>
          </select>

          <select class="btn" name="search_year" id="search_year">
              <?php 
              global $wpdb;
              $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts ORDER BY post_date DESC");
              foreach ($years as $year) {
                  $selected = ($year == $_GET['search_year']) ? 'selected' : '';
                  echo "<option value='" . $year . "' " . $selected . ">" . $year . "</option>";
              }
              ?>
          </select>
   
          <input  type="submit" value="Search">
        </form>

      </div>

    </div>

  </div>

</section>