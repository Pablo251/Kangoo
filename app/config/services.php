<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Flash\Direct as Flash;
//use Phalcon\Acl;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});
/**
 * Loading routes from the routes.php file
 */
$di->set('router', function() {
	return require __DIR__ . '/routers.php';
});
/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Start the sendmail
 */
$di->set('mail', function(){
        return new Mail();
});

/**
* helper to confirm access and authentication
*/
$di->set('auth', function(){
  return new Auth();
});

/**
 *  Registry the Acl
 */
$di->set('acl', function() {
  return new Acl();
});

/**
* Seting a dispatcher conponent
*/
$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    return $dispatcher;
});
// $di->set('flash', function () {
//     return new Flash(array(
//         'error' => 'alert alert-danger',
//         'success' => 'alert alert-success',
//         'notice' => 'alert alert-info',
//         'warning' => 'alert alert-warning'
//     ));
// });
