<?php
/*
Plugin Name: Friends Only
Plugin URI: http://wordpress.org/extend/plugins/friends-only/
Description: Restrict blog access to users who log in with a permitted email addresses (no usernames or passwords required!).
Version: 0.7.2
Author: Gabriel White
Author URI: http://profiles.wordpress.org/users/gabrielwhite/
License: GPL2
*/

/*  Copyright 2010-13  Gabriel White

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Create hook for running the sentry when a page is loaded

add_action ( 'init', 'fo_runSentry');

// Remove content from the page header

remove_action( 'wp_head', 'feed_links_extra'); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links'); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'index_rel_link'); // index link
remove_action( 'wp_head', 'parent_post_rel_link'); // prev link
remove_action( 'wp_head', 'start_post_rel_link'); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link'); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'wp_generator'); // WP Generator

// Load the settings module

include 'settings.php';

// Load the Sentry module

include 'sentry.php';

?>