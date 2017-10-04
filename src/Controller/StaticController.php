<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

// this controller is without any db
class StaticController extends AppController
{

  // allow to not authorized users access to all static pages
  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      $this->Auth->allow();
  }

  public function index(){
    $this->redirect(['controller' => 'Product', 'action' => 'index']);
  }

  public function about(){

  }

  public function contact(){

  }

  public function faq(){

  }

  public function subscriptions(){

  }

}
