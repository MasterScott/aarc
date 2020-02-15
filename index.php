<?php
/**
* AARC Framework
*
* A high performance, open source web application framework.
*
* @package : Aarc Framework
* @author : Rajkumar Dusad
* @copyright : Rajkumar Dusad
* @license : MIT License
* @link : https://github.com/rajkumardusad/aarc
*/

/**
* Application Directory
* Set your default application directory path.
* Exapmle :
*    define('APP_DIR', 'application');
*/
//Application directory path
define('APP_DIR', 'application');

/**
* System Directory
* Set your default system directory path.
* Exapmle :
*    define('SYS_DIR', 'system');
*/
//System directory path
define('SYS_DIR', 'system');

//System base path
define('BASEPATH', __DIR__);

//Required system file
if(file_exists(trim(SYS_DIR,'/').'/core/aarc.php')) {
  require_once(trim(SYS_DIR,'/').'/core/aarc.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/aarc.php' : file note found");
}

/**
* Start web app
* Initialize aarc web application.
*/
$aarc=new aarc();
?>