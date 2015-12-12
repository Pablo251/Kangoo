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
 * This scripts generates random posts
 */
require 'cli.php';
use Phalcon\Mvc\Controller;
use Phalcon\Loader;
class MailTask extends Phalcon\DI\Injectable
{
    public function run($config)
    {
        // $spool = new Mail();
        // $spool->getRandomStuff();
        echo "Holis".$this->mail->getRandomStuff();
        //var_dump();
    }
}
try {
    $task = new MailTask($config);
    $task->run($config);
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString();
}
