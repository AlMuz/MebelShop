<?php
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AdminAppController extends \App\Controller\AppController
{
  ublic function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->deny();

    }

    public function beforeRender(Event $event)
  {
      parent::beforeRender($event);


  }




}
