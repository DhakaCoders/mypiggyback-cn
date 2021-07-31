<?php
/*Template Name: Order*/
get_header(); 
$thisID = get_the_ID();
if(sidebar_hide_spacific_page()){
	get_template_part('templates/page', 'breadcrumb');
}

the_content(); 

get_footer(); 
?>