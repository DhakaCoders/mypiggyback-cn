<?php
/*
 * initial posts dispaly
 */
function script_load_more($args = array()) {
  $big_post = cbv_top_big_post();
  $post_not_id = !empty($big_post['post_not_id'])? $big_post['post_not_id']: '';
  $output = '';
  $output .= $big_post['output'];
	$output .='<div class="np-agenda-rgt-grds-item" id="ajax-agenda" data-postnot="'.$post_not_id.'">';
    $output .='<ul class="reset-list clearfix" id="agenda-content">';
		$output .= cbv_load_more_a($args, $post_not_id);
    $output .= '</ul>';
       
	$output .='<div class="np-loadmore-btn" id="cbv-ajax-btn-1">
	<div class="ajaxloading" id="ajxaloader1" style="display:none"><img src="'.get_template_directory_uri().'/assets/images/loading.gif" alt="loader"></div>
	<span id="agenda_post" data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></span>';
	$output .='</div>';
	$output .='</div>';
return $output;
}
/*
 * create short code.
 */
add_shortcode('ajax_agenda', 'script_load_more');

function cbv_top_big_post() {
  $data = array(); $postID = '';
  //number of posts per page default
  $num = 1;
  //page number
  $query = new WP_Query(array( 
      'post_type'=> 'agenda',
      'post_status' => 'publish',
      'posts_per_page' => $num,
      'order'=> 'DESC'
    ) 
  );
  $output = '';

  if($query->have_posts()): 
      while($query->have_posts()): $query->the_post(); 
        $postID = get_the_ID();
        $overzicht = get_field('overzicht', $postID);
        $gridImg = !empty($overzicht['afbeelding'])? cbv_get_image_src( $overzicht['afbeelding'], 'agendagrid' ): '';
        $excerpt = !empty($overzicht['beschrijving'])? wpautop( $overzicht['beschrijving']): '';
        $label = !empty($overzicht['etiket'])? '<label>'.$overzicht['etiket'].'</label>': '';
        $datum = !empty($overzicht['datum'])? '<strong>'.$overzicht['datum'].'</strong>': '';
        $output .='<div class="np-agenda-lftimg-rgt-des clearfix">';
          $output .='<div class="np-agenda-lftimg-ctlr mHc1">';
            $output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
            $output .='<div class="np-agenda-lftimg inline-bg" style="background: url('.$gridImg.');"></div>';
          $output .='</div>';
          $output .='<div class="np-agenda-rgt-des mHc1">';
            $output .='<div class="np-agenda-rgt-des-inr">';
              $output .= $label;
              $output .='<h5 class="np-agenda-rgt-des-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
              $output .= $datum;
              $output .= $excerpt;
              $output .='<a href="'.get_the_permalink().'">Meer Info</a>';
            $output .='</div>';
          $output .='</div>';
        $output .='</div>';
     endwhile; 
    endif;  
    wp_reset_postdata();
    $data = array(
      'post_not_id' => $postID,
      'output' => $output
    );
    return $data;
}

function cbv_load_more_a($args, $post_not_id = '') {
	
	//number of posts per page default
	$num = 2;
	//page number
  if( !empty($post_not_id) ){
    $query = new WP_Query(array( 
        'post_type'=> 'agenda',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'post__not_in' => array($post_not_id),
        'order'=> 'DESC'
      ) 
    );
  }else{
    $query = new WP_Query(array( 
        'post_type'=> 'agenda',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'order'=> 'DESC'
      ) 
    );
  }
	$output = '';

  if($query->have_posts()): 
      while($query->have_posts()): $query->the_post(); 
      	$overzicht = get_field('overzicht', get_the_ID());
        $gridImg = !empty($overzicht['afbeelding'])? cbv_get_image_src( $overzicht['afbeelding'], 'agendagrid' ): '';
        $excerpt = !empty($overzicht['beschrijving'])? wpautop( $overzicht['beschrijving']): '';
        $label = !empty($overzicht['etiket'])? '<label>'.$overzicht['etiket'].'</label>': '';
        $datum = !empty($overzicht['datum'])? '<strong>'.$overzicht['datum'].'</strong>': '';
        $output .='<li>';
          $output .='<div class="np-angenda-grd-item">';
            $output .='<div class="np-angenda-grd-item-img-ctlr">';
              $output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
              $output .='<div class="np-angenda-grd-item-img inline-bg" style="background: url('.$gridImg.');"></div>';
            $output .='</div>';
            $output .='<div class="np-agenda-grd-item-des">';
              $output .= $label;
              $output .='<h5 class="np-agid-title mHc"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
              $output .= $datum;
              $output .='<div class="np-agid-text-module mHc1">';
                $output .= $excerpt;
              $output .='</div>';
              $output .='<a href="'.get_the_permalink().'">Meer Info</a>';
            $output .='</div>';
          $output .='</div>';
        $output .='</li>';

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
function ajax_script_load_more($args, $post_not_id = '') {
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
  if( isset($_POST['postnot_id']) ){
    $post_not_id = $_POST['postnot_id'];
  }
  if( !empty($post_not_id) ){
    $query = new WP_Query(array( 
        'post_type'=> 'agenda',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'post__not_in' => array($post_not_id),
        'paged'=>$paged,
        'order'=> 'DESC'
      ) 
    );
  }else{
    $query = new WP_Query(array( 
        'post_type'=> 'agenda',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged,
        'order'=> 'DESC'
      ) 
    );
  }

      if($query->have_posts()): 
        $output = '';
        while($query->have_posts()): $query->the_post(); 
          $overzicht = get_field('overzicht', get_the_ID());
          $gridImg = !empty($overzicht['afbeelding'])? cbv_get_image_src( $overzicht['afbeelding'], 'agendagrid' ): '';
          $excerpt = !empty($overzicht['beschrijving'])? wpautop( $overzicht['beschrijving']): '';
          $label = !empty($overzicht['etiket'])? '<label>'.$overzicht['etiket'].'</label>': '';
          $datum = !empty($overzicht['datum'])? '<strong>'.$overzicht['datum'].'</strong>': '';
          $output .='<li>';
            $output .='<div class="np-angenda-grd-item">';
              $output .='<div class="np-angenda-grd-item-img-ctlr">';
                $output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
                $output .='<div class="np-angenda-grd-item-img inline-bg" style="background: url('.$gridImg.');"></div>';
              $output .='</div>';
              $output .='<div class="np-agenda-grd-item-des">';
                $output .= $label;
                $output .='<h5 class="np-agid-title mHc"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
                $output .= $datum;
                $output .='<div class="np-agid-text-module mHc1">';
                  $output .= $excerpt;
                $output .='</div>';
                $output .='<a href="'.get_the_permalink().'">Meer Info</a>';
              $output .='</div>';
            $output .='</div>';
          $output .='</li>';

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
add_action('wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more');
add_action('wp_ajax_ajax_script_load_more', 'ajax_script_load_more');

/*
 * enqueue js script
 */
add_action( 'wp_enqueue_scripts', 'ajax_enqueue_script' );
/*
 * enqueue js script call back
 */
function ajax_enqueue_script() {
    wp_enqueue_script( 'script_ajax', get_theme_file_uri( '/assets/js/ajax-scripts.js' ), array( 'jquery' ), '1.0', true );
}