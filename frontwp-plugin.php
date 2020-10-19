<?php
/**
* Plugin Name:       Front Software Basic
* Plugin URI:        https://frontsoftware.no/wordpress
* Description:       Legger til funktionalitet Front Software skal ha hos alle sine kunder.
* Version:           0.1
* Requires at least: 4.2
* Requires PHP:      7.0
* Author:            Front Software - Joakim Tveter
* Author URI:        https://frontsoftware.no
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       frontwp-basic
* Domain Path:       /languages
*
* Front Software Basic is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
* 
* Front Software Basic is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Front Software Basic. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//Require includes
require_once( plugin_dir_path( __FILE__ ) . 'includes/settings.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/login.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/admin.php');

// Add settings link to plugin list
function frontwp_plugin_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=frontwp-options">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'frontwp_plugin_settings_link' );
