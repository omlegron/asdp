<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-11 10:54:11 --> Severity: error --> Exception: syntax error, unexpected '$similarProduct' (T_VARIABLE) C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 333
ERROR - 2019-09-11 10:57:02 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 10:57:06 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 10:57:15 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 550
ERROR - 2019-09-11 11:06:40 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 11:22:15 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:22:15 --> Severity: Notice --> Trying to get property 'small' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:22:15 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:22:23 --> Could not find the language line "Edit Product"
ERROR - 2019-09-11 11:22:24 --> Could not find the language line "Edit Product"
ERROR - 2019-09-11 11:23:41 --> Could not find the language line "Edit Product"
ERROR - 2019-09-11 11:23:42 --> Could not find the language line "Edit Product"
ERROR - 2019-09-11 11:23:43 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:23:43 --> Severity: Notice --> Trying to get property 'small' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:23:43 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\product\detail.php 42
ERROR - 2019-09-11 11:59:31 --> Could not find the language line "ListMarkter"
ERROR - 2019-09-11 11:59:44 --> Could not find the language line "ListMarkter"
ERROR - 2019-09-11 11:59:58 --> Could not find the language line "ListMarkter"
ERROR - 2019-09-11 12:00:07 --> Could not find the language line "ListMarkter"
ERROR - 2019-09-11 12:02:50 --> Severity: error --> Exception: syntax error, unexpected ')' C:\xampp\htdocs\bazaarplace_jws\application\controllers\Supplier.php 1214
ERROR - 2019-09-11 12:03:06 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 12:24:59 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 12:25:51 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 12:25:53 --> Severity: error --> Exception: Too few arguments to function Supplier::ListMarketer(), 0 passed in C:\xampp\htdocs\bazaarplace_jws\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\bazaarplace_jws\application\controllers\Supplier.php 1212
ERROR - 2019-09-11 12:26:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'where B.store='12' order by num_of_roduct DESC LIMIT 0, 5' at line 6 - Invalid query: select count(A.id) as num_of_roduct, D.name as user, D.email, D.user_role2, C.brand, C.url, C.logo
                            from product_store A 
                            join product B on (B.id = A.product)
                            join store C on (C.id = A.store)
                            join user D on (D.id = A.user)
                            where A.store_type=1   where B.store='12' order by num_of_roduct DESC LIMIT 0, 5
ERROR - 2019-09-11 12:27:02 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 121
ERROR - 2019-09-11 13:45:26 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 129
ERROR - 2019-09-11 13:50:01 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 13:50:05 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 13:50:11 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 13:52:24 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 13:53:09 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 13:53:18 --> Query error: Unknown column 'A.store_typeasdasd' in 'where clause' - Invalid query: select A.id as num_of_roduct, D.name as user, D.email, D.user_role2, C.brand, C.url, C.logo
                            from product_store A 
                            join product B on (B.id = A.product)
                            join store C on (C.id = A.store)
                            join user D on (D.id = A.user)
                            where A.store_typeasdasd=1   && B.store='12' order by num_of_roduct DESC LIMIT 0, 5
ERROR - 2019-09-11 14:05:38 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 14:05:49 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:05:53 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:07:50 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:08:13 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:08:29 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:08:33 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:08:42 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:08:55 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\product.php 585
ERROR - 2019-09-11 14:09:04 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\mail\mailtoMarketer.php 51
ERROR - 2019-09-11 14:09:04 --> Severity: Notice --> Trying to get property 'small' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\mail\mailtoMarketer.php 51
ERROR - 2019-09-11 14:09:18 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\mail\mailtoMarketer.php 51
ERROR - 2019-09-11 14:09:18 --> Severity: Notice --> Trying to get property 'small' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\mail\mailtoMarketer.php 51
ERROR - 2019-09-11 14:09:25 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 52
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 52
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 52
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:25 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: img C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 55
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 56
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 64
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 66
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 73
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:09:56 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 88
ERROR - 2019-09-11 14:11:05 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'seo' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 62
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:11:06 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:34 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:34 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:35 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:59 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Trying to get property 'price' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 70
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Trying to get property 'quantity' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 72
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 74
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Undefined variable: checkmembership C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 79
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:12:59 --> Severity: Notice --> Trying to get property 'product_store_id' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 94
ERROR - 2019-09-11 14:14:22 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:14:22 --> Severity: Notice --> Undefined variable: value C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:14:22 --> Severity: Notice --> Trying to get property 'email' of non-object C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\supplier\ListMarketer.php 68
ERROR - 2019-09-11 14:14:32 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:14:54 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:14:59 --> Could not find the language line "Marketer"
ERROR - 2019-09-11 14:41:35 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:41:41 --> Could not find the language line "msg_login_to_access"
ERROR - 2019-09-11 14:42:25 --> Query error: Unknown column 'A.store_typeasdas' in 'where clause' - Invalid query: select count(A.id) as num_of_roduct, D.name as user, D.email, D.user_role2, C.brand, C.url, C.logo
                            from product_store A 
                            join product B on (B.id = A.product)
                            join store C on (C.id = B.store)
                            join user D on (D.id = C.user)
                            where A.store_typeasdas='1'   && A.store='18' GROUP BY B.store order by num_of_roduct DESC LIMIT 0, 5
ERROR - 2019-09-11 14:44:30 --> Query error: Unknown column 'num_of_roduct' in 'order clause' - Invalid query: select count(A.id) as num_of_product, D.name as user, D.email, D.user_role2, C.brand, C.url, C.logo
                            from product_store A 
                            join product B on (B.id = A.product)
                            join store C on (C.id = B.store)
                            join user D on (D.id = C.user)
                            where A.store_type='1'   && A.store='18' GROUP BY B.store order by num_of_roduct DESC LIMIT 0, 5
ERROR - 2019-09-11 14:44:32 --> Query error: Unknown column 'num_of_roduct' in 'order clause' - Invalid query: select count(A.id) as num_of_product, D.name as user, D.email, D.user_role2, C.brand, C.url, C.logo
                            from product_store A 
                            join product B on (B.id = A.product)
                            join store C on (C.id = B.store)
                            join user D on (D.id = C.user)
                            where A.store_type='1'   && A.store='18' GROUP BY B.store order by num_of_roduct DESC LIMIT 0, 5
ERROR - 2019-09-11 14:45:36 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:45:40 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:45:49 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:46:35 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
ERROR - 2019-09-11 14:48:07 --> Severity: Notice --> Undefined variable: TotalOfPage C:\xampp\htdocs\bazaarplace_jws\application\views\frontend\marketer\product.php 109
