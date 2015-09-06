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

foreach ($this->catlist->get_categories_posts() as $single){
  //Start a List Item for each post:
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($single->ID), 'full');
  $url = $thumb[0];
  $video_url = get_post_meta($single->ID, 'video_url', true);

  if( $video_url == NULL and $url) {
    $lcp_display_output .= '<div class="col span_12">';
    $lcp_display_output .= '<a href="#">';
    $lcp_display_output .= '<img src="'.$url.'"/>';
    $lcp_display_output .= '<h4>'.get_the_title($single->ID).'</h4>';
    $lcp_display_output .= '</a>';
    $lcp_display_output .=  '</div>';
  } else 
  if ( $video_url and  $url) {
    $lcp_display_output .= '<div class="col span_12 hasvideo">';
    $lcp_display_output .= '<a href="'.$video_url.'" class="lightbox fancybox.iframe">';
    $lcp_display_output .= '<img src="'.$url.'"/>';
    $lcp_display_output .= '<img src="/wp-content/themes/kqed/img/play-icon.png" alt="play icon" class="play-icon" />';
    $lcp_display_output .= '<h4>'.get_the_title($single->ID).'</h4>';
    $lcp_display_output .= '</a>';
    $lcp_display_output .=  '</div>';
  } else {
    $lcp_display_output .= '<div class="col span_12 quotation">';
    $lcp_display_output .=  $this->get_content($single);
    $lcp_display_output .= '<h5>'.get_the_title($single->ID).'</h5>';
    $lcp_display_output .=  '</div>';
  }
}

$this->lcp_output = $lcp_display_output;