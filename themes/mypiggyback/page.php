<?php
get_header(); 
$thisID = get_the_ID();
if(!is_page('account')){
	get_template_part('templates/page', 'breadcrumb');
}
?>
<section class="mbp-about-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbp-about-team-sec-inr">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>