<?php 
$thisID = get_the_ID();
$custom_page_title = get_post_meta( $thisID, '_custom_page_title', true );
$page_title = (isset( $custom_page_title ) && !empty($custom_page_title)) ? $custom_page_title : get_the_title();
?>
<section class="page-banner-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-banner-wrp clearfix">
          <div class="page-banner-dsc">
            <h1 class="fl-h1"><?php echo $page_title; ?></h1>
          </div>
          <div class="breadcumbs">
            <?php cbv_breadcrumbs(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>