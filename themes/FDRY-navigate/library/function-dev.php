<?php 

/**
 * Functions used for development purposes.
 *
 * @author      Andrea Musso
 *
 */


 /*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 Return svg from ACF file field
    1.3 variables
    1.4 string shortener
    1.5 browser check
    1.6 environment check

  2.0 OUTPUT TOOLKIT
    2.1 google tag manager

  3.0 ACCESS TOOLKIT
    3.1 login page
    3.2 logged-in-only
=======================================================*/

/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 Return svg from ACF file field
/––––––––––––––––––––––––*/
function acfFile_toSvg($file){
	if($file)
    return str_replace('\'', '',  var_export(file_get_contents($file), true));
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
    $string = trim($string);
    if(strlen($string) > $length) {
      $string  = substr($string, 0, $length);
      $string .= $append;
    }
    return $string;
}


/* 1.5 BROWSER CHECK
/------------------------*/
function get_browser_name() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'InternetExplorer';
    return 'Other';
}


/*==================================================================================
  2.0 OUTPUT TOOLKIT
==================================================================================*/

/* 2.1 GOOGLE TAG MANAGER
/––––––––––––––––––––––––*/
// outputs one of the two parts of the Google Tag Manager scripts
// Usage: gtm('head', 'GTM-1234567) and gtm('body', 'GTM-1234567)
function WPSeed_gtm($type) {

    GLOBAL $GTM_id;
    if ($GTM_id) {
        if ($type == 'head') {
        echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',' $GTM_id ');</script>";

        }elseif ($type == 'body') {
    
        echo ' <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $GTM_id ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
        
        }
    }
    
}


 // Print the image's srcset for lazyload
 function bml_the_image_srcset( $image_id, $echo = true ) {

  if ( !$image_id ) return;

  $image_labels = [ 'size_400', 'size_600', 'size_800', 'size_1000', 'size_1200', 'size_1400', 'size_1600', 'size_1800', 'full' ];
  $image_set = [];

  foreach ( $image_labels as $image_label ) {

    $image = wp_get_attachment_image_src( $image_id, $image_label );
    $image_url = $image[0];
    $image_width = $image[1] <= 300 ? 301 : $image[1];

    $image_set[] =  $image_url . ' ' . ( $image_width - 300 ) . 'w' ;
  }

  $image_set = array_unique( $image_set );

  if ( $echo ) {
    echo implode( ', ', $image_set );
  } else {
    return implode( ', ', $image_set );
  }
  
}


//
//  Print pretty array
//
function debug_ppa($variable){
  return debug(print("<pre>".print_r($variable,true)."</pre>"));
}

//
//  Render
//
function render_theme_component($component_name,$args = []){
  include get_template_directory() . '/template/components/' . $component_name . '.php';
}

function render_theme_block($block_name,$args = []){

  if(isset($args['id_block'])) {
      if (is_string($args['id_block'])) {
          $fields = get_field($args['id_block']);
      } else {
          $fields = $args['id_block'];
      }
  }

  include get_template_directory() . '/template/blocks/' . $block_name . '.php';

}



/**
* Pagination
*
* @param int $pages number of pages.
* @param int $range number of links to show of lest and right from current post.
*
* @return html Returns the pagination html block.
*/
function wds_pagination($pages = '', $range = 4) {
  global $paged;
  $showitems = ($range * 2)+1; // links to show
  // init paged
  if(empty($paged))
  $paged = 1;
  // init pages
  if($pages == '') {
  global $wp_query;
  $pages = $wp_query->max_num_pages;
  if(!$pages)
  $pages = 1;
  }
  // if $pages more then one post
  if(1 != $pages) {
  // Prev link
  echo "<div class='pagination-box prev-box'>";
  if($paged == 1) {
    echo '<p class="hide">Previous</p>';
  }else{
    echo '<a href="'.get_pagenum_link($paged - 1).'">Previous</a>';
  }
  echo '</div>';

  // Links of pages
  echo '<div class="pagination-box number-box">';
  for ($i=1; $i <= $pages; $i++)
  if (1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
  echo ($paged == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '">' . $i . 
  '</a>';
  echo '</div>';

  // Next link
  echo '<div class="pagination-box next-box">';
  if( $pages == $paged) {
    echo '<p class="hide">Next</p>';
  }else{
    echo '<a href="' . get_pagenum_link($paged + 1) . '">Next</a>';
  }
  echo '</div>';

  echo '</div>';
  }
  }
