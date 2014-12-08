<?php
/**
 * Plugin Name: Mobile Site
 * Plugin URI: http://wpCloud.io
 * Description: Handler for mobile sites.
 * Author: Usability Dynamics, Inc
 * Version: 0.1.1
 * Network: true
 * Vertical: true
 * Author URI: http://wpCloud.io
 * Text Domain: wp-mobile-site
 * Domain Path: /static/locale/
 *
 * GitHub Plugin URI: wpCloud/wp-mobile-site
 *
 * Copyright 2011-2014  Usability Dynamics, Inc.   (email : info@UsabilityDynamics.com)
 *
 * Created by Usability Dynamics, Inc
 * (website: UsabilityDynamics.com       email : info@UsabilityDynamics.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author Andy Potanin <andy.potanin@usabilitydynamics.com>
 *
 *
 *
 * get_option( 'site_type' )
 *
 */


add_action( 'plugins_loaded', function() {
  global $current_blog;

  if($_SERVER['REMOTE_ADDR'] === '68.118.9.33' ) {

    $current_blog->_type = is_array( $current_blog->_type ) ? $current_blog->_type : array();

    $current_blog->_type[] = 'mobile';

    add_filter( 'site_option_site_type', function( $default = false ) {
      return $default ? $default : 'mobile';
    });

  }

});

add_action( 'init', function() {
  global $current_blog;

  if( get_site_option( 'site_type' ) === 'mobile' ) {

    // Hide toolbar
    if( isset( $_GET[ 'phonegap' ] ) && $_GET[ 'phonegap' ] ) {}
    add_filter('show_admin_bar', '__return_false' );

    // @todo Disable non-mobile-friendly plugins
    // remove_action( 'admin_notices', array( 'Jetpack', 'admin_connect_notice' ) );

  }

});

