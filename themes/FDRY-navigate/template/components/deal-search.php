<?php
/**
 * SEARCH BAR for service providers
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

 $sectorTerms = get_terms([
  'taxonomy' => 'sector',
  'hide_empty' => false,
]);


$locationTerms = get_terms([
  'taxonomy' => 'location',
  'hide_empty' => false,
]);

$getSector='';
$getLocation = '';
if($_GET){
  $getSector = $_GET['sector'];
  $getLocation = $_GET['location'];
}

 ?>



 <div class="search-bar__container">
  <div class="content-block">
    <p class="h2">Filter</p>
    <form method="GET"  action="<?= site_url('/archives/deal') ?>"  id="sortForm" >

      <select name="sector" id="sector">
        <option value="" data-i18n-key="search-by-sector">Sectors/Industry</option>
        <?php foreach($sectorTerms as $sector) : ?>
          <option value="<?php echo $sector->slug ?>" <?= $sector->slug === $getSector ? 'selected' : '' ?> ><?php echo $sector->name ?></option>
        <?php endforeach; ?>
      </select>

      <select name="location" id="location">
        <option value="" data-i18n-key="search-by-stage">Location</option>
        <?php foreach($locationTerms as $location) : ?>
          <option value="<?php echo $location->slug ?>" <?= $location->slug === $getLocation ? 'selected' : '' ?> ><?php echo $location->name ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit"  data-i18n-key="apply" >Apply</button>
    </form>

  </div>
 </div>
