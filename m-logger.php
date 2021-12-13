<?php
/*
Plugin Name: M-Logger
Plugin URI: https://github.com/maximmas/m-logger
Description: PHP vars tracking
Version: 1.0
Author: Maxim Maslov
Author URI: maximmaslov.ru
License: GPLv2
Network: true
Text domain: ML
*/

/*  Copyright 2020  Maxim Maslov  (email : maxim.maslov.kd@gmail.com )

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

define( 'M_LOGGER_PATH', plugin_dir_path( __FILE__ ) );

require_once( M_LOGGER_PATH . '/includes/classes/class-logger.php' );

add_action( 'm-logger', 'loggerInit', 10, 2 );

function loggerInit( $data, $label ) {
	$logger = new ML\Logger( $data, $label );
	$logger->run();
}






