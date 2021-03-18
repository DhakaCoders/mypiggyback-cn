<?php 
/*Template Name: Services*/
get_header();
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
$blocks = get_field('blocks', $thisID);
?>
<section class="services-page">
<?php if( $blocks ): ?>
<?php 
$i = 1;
foreach( $blocks as $block ): ?>
  <div class="services-item-cntrl">
    <div class="serv-fea-img">
      <div class="s-f-img-cntrl">
        <?php if( !empty($block['image']) ) echo cbv_get_image_tag($block['image']); ?>
        <div class="emrs">
          <svg class="Icon-<?php echo $i; ?>" width="86" height="63" viewBox="0 0 86 63" fill="#0178d4"><use xlink:href="#Icon-<?php echo $i; ?>"></use></svg>
        </div>
      </div>  
    </div>
    <div class="sic">
      <div class="sic-des">
        <?php if( !empty($block['title']) ) printf('<h2 class="fl-h2 sic-title">%s</h2>', $block['title']); ?>
        <div class="sic-p">
        <?php if( !empty($block['description']) ) echo wpautop( $block['description'] ); ?>
        </div>          
        <?php 
	        $link = $block['link'];
	        if( is_array( $link ) &&  !empty( $link['url'] ) ){
	            printf('<a class="fl-red-btn" href="%s" target="%s">%s</a>', $link['url'], $link['target'], $link['title']); 
	        }
        ?>
      </div>
    </div>
  </div>
<?php $i++; endforeach; ?>
<?php endif; ?>
</section>
<?php get_footer(); ?>