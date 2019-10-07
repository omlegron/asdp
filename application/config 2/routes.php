<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'page';

$route['product/detail/(:any)/(:any)'] = 'product/detail';
$route['product/discuss'] = 'product/discuss';
$route['product/discuss_comment'] = 'product/discuss_comment';
$route['product/(:any)'] = 'product';
$route['product/(:any)/(:any)'] = 'product';

//$route['suppliers/detail/(:any)'] = 'suppliers/detail';
//$route['suppliers/(:any)'] = 'suppliers';

$route['marketer/product/(:any)'] = 'marketer/product';
$route['marketer/agent/(:any)'] = 'marketer/agent';

$route['m'] = 'm';
$route['m/subscribeMembership'] = 'm/subscribeMembership';
$route['m/(:any)'] = 'm';
$route['m/(:any)/(:any)'] = 'm';

$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;
