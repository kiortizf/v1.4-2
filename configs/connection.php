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
	'HOSTNAME' => 'put here your hostname', // HOST NAME
  'USERNAME' => 'put here the database username',      // DATABASE USERNAME
  'PASSWORD' => 'put here the database password',      // DATABASE PASSWORD
  'DATABASE' => 'put here the database name' // DATABASE NAME
];

$db = new mysqli($connect['HOSTNAME'], $connect['USERNAME'], $connect['PASSWORD'], $connect['DATABASE']);
if($db->connect_errno){
    echo "Failed to connect to MySQL : (" . $db->connect_errno . ") " . $db->connect_error;
		exit;
}
