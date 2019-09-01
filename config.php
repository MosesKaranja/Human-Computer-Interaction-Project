<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/shantel/');
define('CART_COOKIE','mnknasdkwHSJHFAS23JASDJjsak');
define('CART_COOKIE_EXPIRE', time() + (86400*30));
define('TAXRATE', 0.5);

define('CURRENCY', 'usd');
define('CHECKOUTMODE', 'TEST'); /*Change to live wen switching to live*/

if(CHECKOUTMODE == 'TEST'){
	define('STRIPE_PRIVATE','sk_test_rtMlZYSY8kM6thb3KmIHy0zP007MCvSBI3');
	define('STRIPE_PUBLIC','pk_test_4Ky3PeTEiODsxtNyzm342GHA00wv5BpuO1');

}

/*if(CHECKOUTMODE == 'LIVE'){
	define('STRIPE_PRIVATE','');
	define('STRIPE_PUBLIC','');
}*/


?>