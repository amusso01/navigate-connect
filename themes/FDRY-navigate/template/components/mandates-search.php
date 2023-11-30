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


$stageTerms = get_terms([
  'taxonomy' => 'stage',
  'hide_empty' => false,
]);

$getSector='';
$getStage = '';
if($_GET){
  $getSector = $_GET['sector'];
  $getStage = $_GET['stage'];
}

 ?>



 <div class="search-bar__container">
  <div class="content-block">
    <p class="h2">Filter</p>
    <form method="GET"  action="<?= site_url('/archives/mandates') ?>"  id="sortForm" >

      <select name="sector" id="sector">
        <option value="" data-i18n-key="search-by-sector">Sectors/Industry</option>
        <?php foreach($sectorTerms as $sector) : ?>
          <option value="<?php echo $sector->slug ?>" <?= $sector->slug === $getSector ? 'selected' : '' ?> ><?php echo $sector->name ?></option>
        <?php endforeach; ?>
      </select>

      <select name="stage" id="stage">
        <option value="" data-i18n-key="search-by-stage">Stage of Investment interest</option>
        <?php foreach($stageTerms as $stage) : ?>
          <option value="<?php echo $stage->slug ?>" <?= $stage->slug === $getStage ? 'selected' : '' ?> ><?php echo $stage->name ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit"  data-i18n-key="apply" >Apply</button>
    </form>

  </div>
 </div>
