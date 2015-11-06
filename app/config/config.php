<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
  'database' => array(
    'adapter'     => 'Mysql',
    'host'        => 'localhost',
    'username'    => 'root',
    'password'    => '',
    'dbname'      => 'dbkangoo',
    'charset'     => 'utf8',
  ),
  'application' => array(
    'controllersDir' => APP_PATH . '/app/controllers/',
    'modelsDir'      => APP_PATH . '/app/models/',
    'migrationsDir'  => APP_PATH . '/app/migrations/',
    'formsDir'       => APP_PATH . '/app/forms/',
    'viewsDir'       => APP_PATH . '/app/views/',
    'pluginsDir'     => APP_PATH . '/app/plugins/',
    'libraryDir'     => APP_PATH . '/app/library/',
    'cacheDir'       => APP_PATH . '/app/cache/',
    'baseUri'        => '/kangoo/',
    'publicUrl'      => '127.0.0.1/kangoo',
  ),
  'mail' => array(
    'fromName' => 'Phalcon Term',
    'fromEmail' => 'fcopensuse@gmail.com',
    'smtp' => array(
      'server'	=> 'smtp.gmail.com',
      'port' 		=> 465,
      'security' => 'ssl',
      'username' => 'fcopensuse@gmail.com',
      'password' => '',
    )
  )
));cd
