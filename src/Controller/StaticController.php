<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class StaticController extends AppController
{

  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      $this->Auth->allow();
  }

  public function about(){

  }

  public function contact(){

  }

  public function faq(){

  }

  public function subscriptions(){

  }

  public function payment(){

  }

  public function shipping(){

  }

}
