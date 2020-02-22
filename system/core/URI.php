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
* URI Library
* URI Library is store all the URLs releted data.
*
* @package : URI Library
* @category : Library
* @author : aarc framework
* @link : https://github.com/rajkumardusad/aarc
*/

class URI{
  //Base URL
  public $base_url;
  //Static URL
  public $static;
  //Media URL
  public $media;

  //Initialize all the objects
  function __construct() {
    $this->base_url=$this->base_url();
    $this->static=$this->static();
    $this->media=$this->media();
  }

  /**
  * Base URL
  * Base URL generate the absolute url of any path and it will also return site base url.
  */
  public function base_url(string $path=NULL){
    $base_url=((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1)) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') || (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS'])!== 'off') ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
    if($path){
      $path=ltrim($path,'/');
      return $base_url.$path;
    } else {
      return $base_url;
    }
  }

  /**
  * Static URL
  * Static URL return static files URL and generate absolute URL of any path.
  */
  public function static(string $path=NULL){
    global $setting;
    $static=$this->base_url().'/'.ltrim($setting['static'],'/');
    if($path){
      $path=ltrim($path,'/');
      return rtrim($static,'/').'/'.$path;
    } else {
      return $static;
    }
  }

  /**
  * Media URL
  * Media URL return media files URL and generate absolute URL of any path.
  */
  public function media(string $path=NULL){
    global $setting;
    $media=$this->base_url().'/'.ltrim($setting['media'],'/');
    if($path){
      $path=ltrim($path,'/');
      return rtrim($media,'/').'/'.$path;
    } else {
      return $media;
    }
  }
}