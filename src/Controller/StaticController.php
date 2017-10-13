<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;

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
    // sending email from my email to my email
    if ($this->request->is('post')) {
      $email = new Email('default');
      $email->transport('gmail');
      // getting data from request
      $subject = 'Contact with us | Subject: '.$this->request->data['subject'];
      $msg = 'Message from Email: '.$this->request->data['email'].'
              <br> Name: '.$this->request->data['name'].'
              <br> Message: '. $this->request->data['message'];
      try {
        $email
             ->transport('gmail')
             ->from(['teregan1996@gmail.com' => 'MuzInterior - Online shop'])
             ->to(['teregan1996@gmail.com' => 'MuzInterior - Online shop'])
             ->subject($subject)
              ->emailFormat('html')
             ->viewVars(['msg' => $msg])
             ->send($msg);
      } catch (Exception $e) {
        echo 'Exception : ',  $e->getMessage(), "\n";
      }
      $this->Flash->success(__('You successfully contacted with us'));
      return $this->redirect(['controller'=>'product','action' => 'index']);
    }
  }

  public function faq(){

  }

  public function subscriptions(){

  }

}
