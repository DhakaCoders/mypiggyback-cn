<?php
/*
 * initial posts dispaly
 */
function script_load_more_arrange($args = array()) {
  $output = '';
	$output .='<div class="np-arrangementen-grds-item" id="ajax-arrange">';
    $output .='<ul class="reset-list clearfix" id="arrange-content">';
		$output .= cbv_load_more_arrange($args);
    $output .= '</ul>';
       
	$output .='<div class="np-loadmore-btn" id="cbv-ajax-btn-3">
	<div class="ajaxloading" id="ajxaloader3" style="display:none"><img src="'.get_template_directory_uri().'/assets/images/loading.gif" alt="loader"></div>
	<span id="arrange_post" data-page3="1" data-url="'.admin_url("admin-ajax.php").'" ></span>';
	$output .='</div>';
	$output .='</div>';
  return $output;
}
/*
 * create short code.
 */
add_shortcode('ajax_arrange', 'script_load_more_arrange');

function cbv_load_more_arrange($args) {
	
	//number of posts per page default
	$num = 2;
	//page number
  $query = new WP_Query(array( 
      'post_type'=> 'arrangementen',
      'post_status' => 'publish',
      'posts_per_page' =>$num,
      'order'=> 'DESC'
    ) 
  );
	$output = '';

  if($query->have_posts()): 
    $i = 1;
    while($query->have_posts()): $query->the_post(); 
      if( $i%2==0 ){$class = ' lftimg-rgtdes'; }else{$class = '';}
    	$overzicht = get_field('overzicht', get_the_ID());
      $gridImg = !empty($overzicht['afbeelding'])? cbv_get_image_src( $overzicht['afbeelding'], 'agendagrid' ): '';
      $excerpt = !empty($overzicht['kort_beschrijving'])? wpautop( $overzicht['kort_beschrijving']): '';
      $label = !empty($overzicht['etiket'])? '<label>'.$overzicht['etiket'].'</label>': '';
      $price = !empty($overzicht['prijs'])? $overzicht['prijs']:'';
      $output .='<li>';
      $output .='<div class="np-arrangementen-grd-item clearfix'.$class.'">';
      $output .='<div class="np-agi-lft-img mHc">';
      $output .='<div class="np-agi-lft-img-ctlr">';
      $output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
      $output .='<div class="np-agi-lft-img-inr inline-bg" style="background: url('.$gridImg.');"></div>';
      $output .='</div>';
      $output .='</div>';
      $output .='<div class="np-agi-rgt-des mHc">';
      $output .='<div class="np-agi-rgt-des-inr">';
      $output .= $label;
      $output .='<h5 class="np-agird-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
      $output .='<div class="np-ag-package-price">';
      $output .='<span class="woocommerce-Price-amount amount">';
      $output .='<bdi>'.$price.'</bdi>';
      $output .='</span>';
      $output .='</div>';
      $output .='<div class="np-agi-des-text-module mHc1">';
      $output .= $excerpt;
      $output .='</div>';
      $output .='<a href="'.get_the_permalink().'">
      LEES MEER
      <i>
      <svg class="np-arngmt-lft-arrow-svg" width="6" height="8" viewBox="0 0 6 8" fill="#CB9F67">
      <use xlink:href="#np-arngmt-lft-arrow-svg"></use> 
      </svg>
      </i>';
      $output .='</a>';
      $output .='</div>';
      $output .='</div>';
      $output .='</div>';
      $output .='</li>';
      $i++;
   endwhile; 
  else:
    $output .='<div class="no-resuts">No Results.</div>';
  endif;  
  wp_reset_postdata();
  return $output;
}

/*
 * load more script call back
 */
function ajax_script_load_more_arrange($args) {
	//init ajax
	$ajax = false;
	//check ajax call or not
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	$ajax = true;
	}
	
	//number of posts per page default
	$num = 2;
	//page number
	if( isset($_POST['page']) ){
		$paged = $_POST['page'] + 1;
	}else{
		$paged = 1;
	}
  $query = new WP_Query(array( 
      'post_type'=> 'arrangementen',
      'post_status' => 'publish',
      'posts_per_page' =>$num,
      'paged'=>$paged,
      'order'=> 'DESC'
    ) 
  );

  if($query->have_posts()): 
    $output = '';
    $i = 1;
    while($query->have_posts()): $query->the_post(); 
      if( $i%2==0 ){$class = ' lftimg-rgtdes'; }else{$class = '';}
      $overzicht = get_field('overzicht', get_the_ID());
      $gridImg = !empty($overzicht['afbeelding'])? cbv_get_image_src( $overzicht['afbeelding'], 'agendagrid' ): '';
      $excerpt = !empty($overzicht['kort_beschrijving'])? wpautop( $overzicht['kort_beschrijving']): '';
      $label = !empty($overzicht['etiket'])? '<label>'.$overzicht['etiket'].'</label>': '';
      $price = !empty($overzicht['prijs'])? $overzicht['prijs']:'';
      $output .='<li>';
      $output .='<div class="np-arrangementen-grd-item clearfix'.$class.'">';
      $output .='<div class="np-agi-lft-img mHc">';
      $output .='<div class="np-agi-lft-img-ctlr">';
      $output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
      $output .='<div class="np-agi-lft-img-inr inline-bg" style="background: url('.$gridImg.');"></div>';
      $output .='</div>';
      $output .='</div>';
      $output .='<div class="np-agi-rgt-des mHc">';
      $output .='<div class="np-agi-rgt-des-inr">';
      $output .= $label;
      $output .='<h5 class="np-agird-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
      $output .='<div class="np-ag-package-price">';
      $output .='<span class="woocommerce-Price-amount amount">';
      $output .='<bdi>'.$price.'</bdi>';
      $output .='</span>';
      $output .='</div>';
      $output .='<div class="np-agi-des-text-module mHc1">';
      $output .= $excerpt;
      $output .='</div>';
      $output .='<a href="'.get_the_permalink().'">
      LEES MEER
      <i>
      <svg class="np-arngmt-lft-arrow-svg" width="6" height="8" viewBox="0 0 6 8" fill="#CB9F67">
      <use xlink:href="#np-arngmt-lft-arrow-svg"></use> 
      </svg>
      </i>';
      $output .='</a>';
      $output .='</div>';
      $output .='</div>';
      $output .='</div>';
      $output .='</li>';
      $i++;
  endwhile; 
  echo $output;
  endif;  
  wp_reset_postdata();
  //check ajax call
  if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_script_load_more_arrange', 'ajax_script_load_more_arrange');
add_action('wp_ajax_ajax_script_load_more_arrange', 'ajax_script_load_more_arrange');