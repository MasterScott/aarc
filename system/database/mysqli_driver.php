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
* MySQLi Database Driver
* MySQLi Database Driver extends mysqli class and handle mysql database connection.
*
* @package : MySQLi Database Driver
* @category : Driver
* @author : aarc framework
* @link : https://github.com/rajkumardusad/aarc
*/

class mysqli_db_driver extends mysqli{
  //DSN
  protected $dsn;
  //User Name
  protected $username;
  //Password
  protected $password;
  //Database
  protected $database;
  //Server hostname
  protected $hostname;
  //Server Port
  protected $port;
  //Charset
  protected $char_set;

  function __construct($db,$name) {
    $this->dsn=$db[$name]['dsn'];
    $this->username=$db[$name]['username'];
    $this->password=$db[$name]['password'];
    $this->database=$db[$name]['database'];
    $this->hostname=$db[$name]['hostname'];
    $this->port=$db[$name]['port'];
    $this->char_set=$db[$name]['char_set'];

    //Create MySQLi database connection
    parent::__construct($this->hostname,$this->username,$this->password,$this->database,$this->port);

    //Set charset
    $this->set_charset($this->char_set);

    //Check connection error
    if($this->connect_error) {
      echo 'Connect Error ('.$this->connect_errno.') '.$this->connect_error;
    }
  }
}