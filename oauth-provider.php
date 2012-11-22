<?php
/*
Plugin Name: OAuth Provider
Version: 0.5.2
Plugin URI: http://wordpress.org/extend/plugins/oauth-provider/
Description: A plugin to allow WordPress to use an OAuth authenticator.
Author: wokamoto
Author URI: http://dogmap.jp/
Text Domain: oauth-provider
Domain Path: /languages/

License:
 Released under the GPL license
  http://www.gnu.org/copyleft/gpl.html
  Copyright 2011 - 2012 wokamoto (email : wokamoto1973@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
if (!class_exists('WP_OAuthProvider'))
	require_once(dirname(__FILE__).'/includes/class-oauth-provider.php');

//**************************************************************************************
// Go! Go! Go!
//**************************************************************************************
global $oauth_provider;

if (!isset($oauth_provider))
	$oauth_provider = new WP_OAuthProvider(__FILE__);

if (isset($_GET['oauth']) || isset($_POST['oauth'])) {
	ob_start();
	add_filter('deprecated_argument_trigger_error', create_function('', 'return FALSE;'));
}

// Add Method Sample
add_oauth_method('sayHello', create_function('$request, $userid, $username', 'return array("message" => "Hello {$username}!");'));

if (function_exists('register_activation_hook'))
	register_activation_hook(__FILE__, 'flush_rewrite_rules');
if (function_exists('register_deactivation_hook'))
	register_deactivation_hook(__FILE__, 'flush_rewrite_rules');
