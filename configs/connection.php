<?php
/*=======================================================/
	| Craeted By: Khalid puerto
	| URL: www.puertokhalid.com
	| Facebook: www.facebook.com/prof.puertokhalid
	| Instagram: www.instagram.com/khalidpuerto
	| Whatsapp: +212 654 211 360
 /======================================================*/



# Site Path
# 'path' : Don't need to change the 'path' in the v1.4 ;)

# Tables' Prefix
define('prefix', 'ftree_v1_4_');

$connect = [
	'HOSTNAME' => 'mstc-family-legacy-explorer-server', // HOST NAME
  'USERNAME' => 'smzwyhrigm',      // DATABASE USERNAME
  'PASSWORD' => '5JY5104G607YQVQQ$',      // DATABASE PASSWORD
  'DATABASE' => 'postgres' // DATABASE NAME
];

$db = new mysqli($connect['HOSTNAME'], $connect['USERNAME'], $connect['PASSWORD'], $connect['DATABASE']);
if($db->connect_errno){
    echo "Failed to connect to MySQL : (" . $db->connect_errno . ") " . $db->connect_error;
		exit;
}
