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
$lcp_display_output .= '<div class="cascadeboxes-wrapper mobile-version" id="cbs-aboutpage">';
$lcp_display_output .= '<h3>CAMPAIGN GOALS</h3>';

$anchorIndex = 0;

foreach ($this->catlist->get_categories_posts() as $single){
  $anchorIndex++;

  $ctr++;
  $thumb     = wp_get_attachment_image_src( get_post_thumbnail_id($single->ID), 'full');
  $url       = $thumb[0];
  $accordion = get_field( "accordion_campaign", $single->ID );


  $lcp_display_output .= '
    <div class="single-box" style="background-image:url('.$url.')" data-counter="'.$ctr.'">
      <a href="#accordion-'.$ctr.'">
      <div class="inactive-overlay"></div>
      <div class="overlay">
        <h3>'.get_the_title($single->ID).' <i class="">+</i></h3>
      </div>
      </a>
    </div>
    <div class="details-v2" id="box-no5-details" data-counter="'.$ctr.'" >
      <div class="container row">
        <div class="col span_6">
          <h4 class="big-text">'.$this->get_content($single).'</h4>
        </div>
        <div class="col span_6">
          <div class="accordion"><h2>'.do_shortcode($accordion).'</h2></div>
        </div>
      </div>
    </div> 
  ';
}


// Close the wrapper I opened at the beginning:
$lcp_display_output .= '</div>';


$this->lcp_output = $lcp_display_output;