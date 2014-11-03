<?php
class Job extends MY_Controller {
    var $rows, $facilityList,$combined_form, $message;

    public function __construct() {
        parent::__construct();
        //print var_dump($this->tValue); exit;
        // var_dump($this->session->userdata);die;
        $this -> rows = '';
        $this -> combined_form;

    }
    public function test(){
      require_once(FCPATH .'vendor/autoload.php');

// Write folder content to log every five minutes.
$job1 = new \Cron\Job\ShellJob();
$job1->setCommand('ls -la /application');
$job1->setSchedule(new \Cron\Schedule\CrontabSchedule('*/5 * * * *'));

// Remove folder contents every hour.
$job2 = new \Cron\Job\ShellJob();
$job2->setCommand('rm -rf /path/to/folder/*');
$job2->setSchedule(new \Cron\Schedule\CrontabSchedule('0 0 * * *'));

$resolver = new \Cron\Resolver\ArrayResolver();
$resolver->addJob($job1);
// $resolver->addJob($job2);

$cron = new \Cron\Cron();
$cron->setExecutor(new \Cron\Executor\Executor());
$cron->setResolver($resolver);

$cron->run();
    }
  }
