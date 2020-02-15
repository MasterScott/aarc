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

defined('BASEPATH') OR exit('No direct access allowed');

/**
* Load system files
* Autoload all the system files
*/
if(file_exists(trim(SYS_DIR,'/').'/core/Config.php')) {
  require_once(trim(SYS_DIR,'/').'/core/Config.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/Config.php' : file note found");
}
if(file_exists(trim(SYS_DIR,'/').'/core/Models.php')) {
  require_once(trim(SYS_DIR,'/').'/core/Models.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/Models.php' : file note found");
}
if(file_exists(trim(SYS_DIR,'/').'/core/Controller.php')) {
  require_once(trim(SYS_DIR,'/').'/core/Controller.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/Controller.php' : file note found");
}
if(file_exists(trim(SYS_DIR,'/').'/core/Router.php')) {
  require_once(trim(SYS_DIR,'/').'/core/Router.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/Router.php' : file note found");
}

/**
* Load system libraries
* Autoload all default system libraries.
*/
if(file_exists(trim(SYS_DIR,'/').'/core/URI.php')) {
  require_once(trim(SYS_DIR,'/').'/core/URI.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/URI.php' : file note found");
}
if(file_exists(trim(SYS_DIR,'/').'/core/Input.php')) {
  require_once(trim(SYS_DIR,'/').'/core/Input.php');
} else {
  exit("'".trim(SYS_DIR,'/')."/core/Input.php' : file note found");
}

/**
* Load Application files
* Autoload all the required application files.
*/
if(file_exists(trim(APP_DIR,'/').'/settings.php')) {
  require_once(trim(APP_DIR,'/').'/settings.php');
} else {
  exit("'".trim(APP_DIR,'/')."/settings.php' : file note found");
}
//load application URLs file
if(isset($setting['urls']) && $setting['urls']!=NULL) {
  if(file_exists(trim(APP_DIR,'/').'/'.trim($setting['urls'],'/'))) {
    require_once(trim(APP_DIR,'/').'/'.trim($setting['urls'],'/'));
  } else {
    exit("'".trim(APP_DIR,'/')."/".trim($setting['urls'],'/')."' : file note found");
  }
} else {
  exit('URLs file not found');
}


/**
* Include URLs
* Include apps urls file and merge with main urlpatterns file.
*/
function urls(string $urls_path) {
  //Check URLs pattern exists or not
  if(file_exists($urls_path)) {
    //Include urlpatterns file
    require_once($urls_path);
    //Check urlpatterns array exists or not
    if(isset($urlpatterns) && $urlpatterns) {
      return $urlpatterns;
    } else {
      exit('urlpatterns : array not found');
    }
  } else {
    exit("'$urls_path' : invalid urls path");
  }
}

/**
* AARC Main Class
* Initialize aarc web framework, start listening routes.
*/
class aarc{
  //URLs Router
  private $router;
  function __construct() {
    //URLs Router
    $this->router=new Router();
  }
}