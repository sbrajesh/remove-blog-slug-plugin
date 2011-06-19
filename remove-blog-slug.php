<?php
/*
Plugin Name: Remove /blog slug  plugin for wpmu
Description:Remove /blog slug from wpmu subdirectory install of wpmu default blog 
Version: 1.1
Tested up to: Wordpress 3.0 Multisite,buddypress 1.2.5.2
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Brajesh Singh
Author URI: http://www.ThinkingInWordpress.com/
Plugin URI:http://thinkinginwordpress.com
tags:wpmu,wpms,buddypress,remove slug
*/

/* let us add filters for intercepting the permalink update,category base update and tag base update */

add_filter("pre_update_option_category_base","cc_remove_blog_slug");
add_filter("pre_update_option_tag_base","cc_remove_blog_slug");
add_filter("pre_update_option_permalink_structure","cc_remove_blog_slug");

/* just check if the current structure begins with /blog/ remove that and return the stripped structure */
function cc_remove_blog_slug($tag_cat_permalink){

if(!preg_match("/^\/blog\//",$tag_cat_permalink))
return $tag_cat_permalink;

$new_permalink=preg_replace ("/^\/blog\//","/",$tag_cat_permalink );
return $new_permalink;


}


?>