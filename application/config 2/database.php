<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

/*
		'hostname' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'bazaarplace',

		'hostname' => '127.0.0.1',
        'username' => 'mybelanj_dev',
        'password' => 'X20]F5fI]v&e',
        'database' => 'mybelanj_erp',
*/

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '127.0.0.1',
    'username' => 'bazaarpl_bazaar',
    'password' => 'bazaarplace123',
    'database' => 'bazaarpl_bazaar',
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
