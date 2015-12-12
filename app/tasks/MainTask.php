<?php

class mainTask extends \Phalcon\CLI\Task {

    public function mainAction() {
        echo "\nSent mails \n";
        $mymail = Mail::find("state = 'output' AND active = 1");
        foreach ($mymail as $value) {
          $adressee = Adressee::find("id_mail = ".$value->id_mail." AND active = 1");
          foreach ($adressee as $valueAdress) {
            $changeInAdress = Adressee::findFirst("id_adresse = ".$valueAdress->id_adresse." AND active = 1");
            $this->libaccess->sendNew($changeInAdress->adresse,$value->subject,$value->content);
            $changeInAdress->active = 0;
            $changeInAdress->save();
          }
          $value->state = "sent";
          $value->save();
        }
        // var_dump($this);
    }

    /**
     * @param array $params
     */
    public function testAction() {
        $users = Users::find();
        if($users)
        {
            foreach($users as $user)
            {
                echo $user->name . '-' . $user->email . PHP_EOL;
            }
        }
    }

    // public function consumerAction() {
    //     // Get Beanstalk Service
    //     $queue = $this->getDI('beanstalk');
    //
    //     while (($job = $queue->peekReady()) !== false) {
    //
    //         $job = $queue->reserve();
    //
    //         $message = $job->getBody();
    //
    //         var_dump($message);
    //
    //         $job->delete();
    //     }
    // }
    //
    // public function producerAction() {
    //     // Get Beanstalk Service
    //     $queue = $this->getDI('beanstalk');
    //
    //     //Insert the job in the queue with options
    //     $jobId = $queue->put(
    //             array('processVideo' => 4871)
    //     );
    //     echo $jobId . PHP_EOL;
    // }
    //
    // public function checkAction() {
    //     // Get Beanstalk Service
    //     $queue = $this->getDI('beanstalk');
    //
    //     //echo 'hello' . PHP_EOL;
    // }

}
