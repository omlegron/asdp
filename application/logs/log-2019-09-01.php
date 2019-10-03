<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-01 09:28:06 --> Severity: error --> Exception: syntax error, unexpected '$data' (T_VARIABLE) C:\xampp\htdocs\bazaarplace_jws\application\controllers\Ajax.php 526
ERROR - 2019-09-01 09:28:22 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ',' or ';' C:\xampp\htdocs\bazaarplace_jws\application\controllers\Ajax.php 531
ERROR - 2019-09-01 09:28:45 --> Query error: Unknown column 'A.store_id' in 'where clause' - Invalid query: select A.id as product_store_id, B.title, A.product
                from product_store A 
                join product_lang B
                where A.id>0  && A.store_id=''
ERROR - 2019-09-01 09:42:00 --> Query error: Column 'user_id_agent' cannot be null - Invalid query: INSERT INTO `business_creator` (`store_id_supplier`, `user_id_agent`, `fee`, `product_store_id`, `keterangan`, `status`) VALUES ('22', NULL, '', '', '', '1')
ERROR - 2019-09-01 09:46:47 --> Severity: Notice --> Undefined variable: val C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:46:47 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:46:48 --> Severity: Notice --> Undefined variable: val C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:46:48 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:46:48 --> Severity: Notice --> Undefined variable: val C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:46:48 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 327
ERROR - 2019-09-01 09:50:41 --> Query error: Unknown column 'store_id_supplier' in 'where clause' - Invalid query: SELECT *
FROM `product_store`
WHERE `store_id_supplier` = '16'
ERROR - 2019-09-01 09:50:57 --> Query error: Unknown column 'store_id_supplier' in 'where clause' - Invalid query: SELECT *
FROM `product_store`
WHERE `store_id_supplier` = '16'
ERROR - 2019-09-01 09:51:10 --> Query error: Unknown column 'store_id' in 'where clause' - Invalid query: SELECT *
FROM `product_store`
WHERE `store_id` = '16'
ERROR - 2019-09-01 09:51:12 --> Query error: Unknown column 'store_id' in 'where clause' - Invalid query: SELECT *
FROM `product_store`
WHERE `store_id` = '16'
ERROR - 2019-09-01 09:56:52 --> Severity: Notice --> Undefined variable: name_product C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 179
ERROR - 2019-09-01 10:08:56 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 175
ERROR - 2019-09-01 10:09:56 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\bazaarplace_jws\application\views\backend\business_creator.php 175
ERROR - 2019-09-01 23:15:10 --> Could not find the language line "msg_login_to_access"
