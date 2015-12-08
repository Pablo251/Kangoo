<?php
use Phalcon\Mvc\Controller;
class MainTask extends \Phalcon\CLI\Task
{
    public function mainAction()
    {
        echo "\nThis is the default task and the default action \n";
        //$this->mail->getRandomStuff();
        //var_dump($this->config->database);
        //echo $this->auth->getRandomStuff();
        $User = User::find();
        echo count($User);
    }

    /**
     * @param array $params
     */
    public function testAction(array $params)
    {
        echo sprintf('hello %s', $params[0]) . PHP_EOL;
        echo sprintf('best regards, %s', $params[1]) . PHP_EOL;
    }
}
