<?php
session_start();
error_reporting(E_ALL);
function rewrite_urls($change){
   $match = [
     '/index.php/',
     '/dashboard\.php\?pg=([a-z]+)&id=([0-9]+)/',
     '/dashboard\.php\?pg=([a-z]+)&page=([0-9]+)/',
     '/dashboard\.php\?pg=([a-z]+)/',
     '/dashboard\.php/',

     '/list\.php\?pg=my&page=([0-9]+)/',
     '/list\.php\?pg=my/',
     '/list\.php\?page=([0-9]+)/',
     '/list\.php/',
     '/details\.php\?id=([0-9]+)/',
 		'/details\.php/',

     '/tree\.php\?id=([0-9]+)&t=([A-Za-z0-9-]+)/',

		 '/users\.php\?page=([0-9]+)/',
     '/users\.php/',

     '/page\.php\?id=([0-9]+)/',
     '/rapport\.php\?id=([0-9]+)/',

   ];
   $replace = [
     'index',
     'dashboard/$1/id/$2',
     'dashboard/$1/page/$2',
     'dashboard/$1',
     'dashboard',

     'families/my/page/$1',
     'families/my',
     'families/all/page/$1',
     'families/all',

 		'user/details/$1',
 		'user/details',

 		'tree/$2/$1',

	 'users/all/page/$1',
	 'users/all',

 		'page/$1',
 		'rapport/$1',

   ];

   $change = preg_replace($match, $replace, $change);

 	return $change;
 }
 ob_start("rewrite_urls");

/*=======================================================/
	| Craeted By: Khalid puerto
	| URL: www.puertokhalid.com
	| Facebook: www.facebook.com/prof.puertokhalid
	| Instagram: www.instagram.com/khalidpuerto
	| Whatsapp: +212 654 211 360
 /======================================================*/

function getBaseUrl(){
	$protocol = 'http';
	if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
		$protocol .= 's';
	}
	$host = $_SERVER['HTTP_HOST'];
	$request = $_SERVER['PHP_SELF'];
	return dirname($protocol . '://' . $host . $request);
}

# Your website path
define("path", getBaseUrl());

# Connecting to Database
include __DIR__.'/connection.php';

# If the installation file exists
if (file_exists(__DIR__."/../install.php")) {
	die('<meta http-equiv="refresh" content="0;url=install.php">');
}

# Language
$lang = [];
include __DIR__.'/lang/en.php';

# Functions
include __DIR__.'/func.all.php';
include __DIR__.'/pagination.php';

db_global();

if(site_language){
	$lang = json_decode(site_language, true);
}

define('nophoto',      path.'/images/no_profile_pic.jpg');
define('do_not_reply', site_noreply);

# Currency
define("dollar_sign", site_currency_symbol);
define("dollar_name", site_currency_name);

# Paypal Payement Gateway configuration
define('PAYPAL_CLIENT_ID', (defined("site_paypal_client_id") && site_paypal_client_id != '' ? site_paypal_client_id : ''));
define('PAYPAL_CLIENT_SECRET', (defined("site_paypal_client_secret") && site_paypal_client_secret != '' ? site_paypal_client_secret : ''));
define('PAYPAL_ID', (defined("site_paypal_id") && site_paypal_id != '' ? site_paypal_id : ''));
define('PAYPAL_SANDBOX', (defined("site_paypal_live") && site_paypal_live == 1 ? false : true)); //TRUE (testing) or FALSE (live)

define('PAYPAL_RETURN_URL', path.'/payment-success.php');
define('PAYPAL_CANCEL_URL', path.'/index.php');
define('PAYPAL_NOTIFY_URL', path.'/ipn.php');
define('PAYPAL_CURRENCY', (defined("site_currency_name") && site_currency_name != '' ? site_currency_name : ''));

define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require 'vendor/autoload.php';

$paypalConfig = [
  'client_id'       => PAYPAL_CLIENT_ID,
  'client_secret'   => PAYPAL_CLIENT_SECRET,
  'return_url_plan' => path.'/response-plan.php',
  'return_url'      => path.'/response.php',
  'cancel_url'      => path.'/index.php',
	'sandbox'         => PAYPAL_SANDBOX
];

$apiContext = new ApiContext( new OAuthTokenCredential($paypalConfig['client_id'], $paypalConfig['client_secret']) );
$apiContext->setConfig([ 'mode' => $paypalConfig['sandbox'] ? 'sandbox' : 'live' ]);


# Showing current page name
define('page', basename($_SERVER['PHP_SELF'], '.php'));

# Get Vars
$id      = (isset($_GET['id'])) ? (int)($_GET['id'])            : 0;
$pg      = (isset($_GET['pg'])) ? sc_sec($_GET['pg'])           : '';
$request = (isset($_GET['request'])) ? sc_sec($_GET['request']) : '';
$action  = (isset($_GET['action'])) ? sc_sec($_GET['action'])   : '';
$token   = (isset($_GET['token'])) ? sc_sec($_GET['token'])     : '';
$t       = (isset($_GET['t'])) ? sc_sec($_GET['t'])             : '';

# Session Vars
$lg = (isset($_SESSION['login'])) ? (int)($_SESSION['login']) : 0; // Login
$vp = (isset($_SESSION['vpass'])) ? (int)($_SESSION['vpass']) : 0; // View Password

# Pagination
$page = (int) (!isset($_GET["page"]) || !$_GET["page"] ? 1 : sc_sec($_GET["page"]));
$limit = page == "users" ? 12 : 10;
$startpoint = ($page * $limit) - $limit;

if($lg){
	define("us_level", db_get("users", "level", $lg));
	define("us_name", db_get("users", "username", $lg));
	define("us_email", db_get("users", "email", $lg));
	define("us_plan", db_get("users", "plan", $lg));
	define("us_id", $lg);
	define("us_photo", (db_get("users", "photo", $lg) ? db_get("users", "photo", $lg) : db_get("users", "photo", $lg, 'family', "AND parent = '0'")));
} else {
	define("us_level", 0);
	define("us_name", 0);
	define("us_photo", "");
	define("us_email", 0);
	define("us_plan", 0);
	define("us_id", 0);
}



# Plans Options
define("families",   us_plan ? db_get("plans", "quizzes", us_plan) : 0);
define("members",    us_plan ? db_get("plans", "takers", us_plan) : 0);
define("privates", us_plan ? db_get("plans", "questions", us_plan) : 0);

define("export_statistics", us_plan ? db_get("plans", "export_statistics", us_plan) : '');
define("backgound",         us_plan ? db_get("plans", "backgound", us_plan) : '');
define("integrations",      us_plan ? db_get("plans", "integrations", us_plan) : '');
define("show_ads",          us_plan ? db_get("plans", "show_ads", us_plan) : '');
define("support",           us_plan ? db_get("plans", "support", us_plan) : '');
