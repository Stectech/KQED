<?php
/*
Plugin Name: List Category Posts - Template "Default"
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano 
Author URI: http://picandocodigo.net http://radoviny.net
*/

/* Copyright 2009  Radek Uldrych  (email : verex@centrum.cz), Fernando Briano (http://picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or 
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * The format for templates changed since version 0.17.
 * Since this code is included inside CatListDisplayer, $this refers to
 * the instance of CatListDisplayer that called this file.
 */


/* This is the string which will gather all the information.*/
$lcp_display_output = '';

// Show category link:
$lcp_display_output .= $this->get_category_link('strong');

// Show the conditional title:
$lcp_display_output .= $this->get_conditional_title();

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$lcp_display_output .= '<div class="cascadeboxes-wrapper" id="cbs-aboutpage">';

/**
 * POSTS LOOP
 *
 * The code here will be executed for every post in the category.
 * As you can see, the different options are being called from functions on the
 * $this variable which is a CatListDisplayer.
 *
 * The CatListDisplayer has a function for each field we want to show.
 * So you'll see get_excerpt, get_thumbnail, etc.
 * You can now pass an html tag as a parameter. This tag will sorround the info
 * you want to display. You can also assign a specific CSS class to each field.
 */

$lcp_display_output .= '<div class="innerslider-wrapper">';
$lcp_display_output .= '<h3>THE FUTURE WILL BE...</h3>';
$lcp_display_output .= '<div class="flexslider" id="future-slider">';
$lcp_display_output .= '<ul class="slides">';
$textside = true;
foreach ($this->catlist->get_categories_posts() as $single){
  $accordion = get_post_meta($single->ID, 'accordion_campaign', true);
  $ctr++;
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($single->ID), 'full');
  $url = $thumb[0];

  if ($textside) {
    $lcp_display_output .= '<li><div class="col span_6 image-side"><img src="'.$url.'" /></div><div class="col span_6 text-side">';
    $lcp_display_output .= '<h4>'.get_the_title($single->ID).'</h4>';
    $lcp_display_output .= $this->get_content($single);
    $lcp_display_output .= '</div></li>';
    $textside = false;
  } else {
    $lcp_display_output .= '<li><div class="col span_6 text-side">';
    $lcp_display_output .= '<h4>'.get_the_title($single->ID).'</h4>';
    $lcp_display_output .= $this->get_content($single);
    $lcp_display_output .= '</div>';
    $lcp_display_output .= '<div class="col span_6 image-side"><img src="'.$url.'" /></div></li>';
    $textside = true;
  }
}

// Close the wrapper I opened at the beginning:
$lcp_display_output .= '</ul></div></div>';


$this->lcp_output = $lcp_display_output;