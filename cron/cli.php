<?php
/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-2015 Phalcon Team and contributors                  |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/
/**
 * CLI Bootstrap
 */
error_reporting(E_ALL);
set_time_limit(0);
define('APP_PATH', realpath('..'));
/**
 * Read the configuration
 */
//$config = include APP_PATH . "/app/config/config.php";
/**
 * Include the loader
 */
//require APP_PATH . "/app/config/loader.php";
/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
//$di = new \Phalcon\DI\FactoryDefault();
/**
 * Include the application services
 */
//require APP_PATH . "/app/config/services.php";
/**
 * Include composer autoloader
 */
 /**
  * Read the configuration
  */
 $config = include APP_PATH . "/app/config/config.php";

 /**
  * Read auto-loader
  */
 include APP_PATH . "/app/config/loader.php";
 /**
  * Read routers
  */
 include APP_PATH . "/app/config/routers.php";

 /**
  * Read services
  */
 include APP_PATH . "/app/config/services.php";

 /**
  * Handle the request
  */

 /**
 * Asign config to DI... That allow call some values later.
 */
 $di->set('config', $config);

 $application = new \Phalcon\Mvc\Application($di);

 echo $application->handle()->getContent();
