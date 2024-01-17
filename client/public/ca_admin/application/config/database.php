<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Database Settings
|--------------------------------------------------------------------------
|
*/

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
/*
    'username' => 'swtravels_web_ad',
	'password' => 'lRB5RS@XmH!S',
	'database' => 'sw_travel_admin',*/
	'username' => 'sewaznyn_trvls',
	'password' => 'A*z$!RNghfvA',
	'database' => 'sewaznyn_swtravles',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
