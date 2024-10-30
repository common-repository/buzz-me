<?php
/**
Plugin Name: Buzz Me
Plugin URI: http://www.techofweb.com/plugins/add-google-buzz-blog-buzz.html
Description:  Wordpress Plugin that allows your visitors to share your posts to Google Buzz. This plugin displays buzz icon at the end of your each post.

Version: 0.3
Author: Atul Bansal
Author URI: http://www.techofweb.com/
Stable Tag: trunk
License: A "Slug" license name e.g. GPL2


  Copyright 2011 Atul Bansal (email : oceanofweb@gmail.com) (Blog: http://www.techofweb.com/)

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


INSTRUCTIONS
------------
1. Download the plugin from http://www.techofweb.com/wp-downloads/buzz-me.zip
2. Extract and upload the contents of the archive to 'yourserver.com/wp-content/plugins/buzz-me/'
3. Login to your Wordpress admin panel and browse to the Plugins section.
4. Activate the Buzz Me Wordpress Plugin.

**/


	add_filter('the_content', 'buzz_me_display');
	
		function buzz_me_display($content='') {
			if (is_single())
			$content .= buzz_me();
		  
			return $content;
		}

	function buzz_me() {	
		global $wp_query;
		$post = $wp_query->post;
		$permalink = get_permalink($post->ID);
		$title = urlencode($post->post_title);
		$homelink = get_bloginfo('wpurl');

		$buzz_link = '<a href="http://www.google.com/reader/link?url='.$permalink.'&amp;title='.$title.'" title="Buzz Me" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/buzz-me/images/buzz_me.jpg" width="48" height="48" alt="Buzz Me" border="0"></a>&nbsp;&nbsp;';

		return $buzz_link;
	}

?>
