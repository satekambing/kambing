<?php
/**
  * Keterangan : buat konfiguarasi default aplikasi
**/

// database
define('SERVER','localhost');
define('USER','root');
define('PASS','');
define('DBNAME','simpeg');

//defaul configuration
define('BASE_URL','localhost/framework/');
define('BASE_UPLOADFOTO',BASE_URL.'/files/');
define('br','<br />');
define('DEFAULT_PAGE','home.php');

// system
define('ROOT',dirname(__DIR__));
define('S',DIRECTORY_SEPARATOR); // untuk mengambil slash.. /

// admin
define('DIR_ADMIN','admin');
define('DEFAULT_PAGEADMIN','dashboard.php');

?>
