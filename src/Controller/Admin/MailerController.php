<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Email\Email;

class MailerController extends AppController
{

  // mail page with static content.
  public function index()
  {

  }

  // page where administrator can send email to all users
  public function all()
  {
    $this->loadModel('User');
    $user = $this->User->find('all');
    $this->set(compact('user'));
    if ($this->request->is('post')) {
      // sending email with custom content to users
      $email = new Email('default');
      $email->transport('gmail');
      $subject = $this->request->data['subject'];
      $msg = $this->request->data['message'];
      // getting all existing emails
      $mails = [];
      foreach($user as $user)
      {
          $mails[] = $user->Email;
      }
      try {
        $email
             ->transport('gmail')
             ->from(['teregan1996@gmail.com' => 'MuzInterior - Online shop'])
             ->to($mails)
             ->subject($subject)
              ->emailFormat('html')
             ->viewVars(['msg' => $msg])
             ->send($msg);
      } catch (Exception $e) {
        echo 'Exception : ',  $e->getMessage(), "\n";
      }
      $this->Flash->success(__('Emails successfully sended!'));
      return $this->redirect(['action' => 'index']);

    }
  }

  // sending email to chosen one user
  public function one()
  {
    $this->loadModel('User');
    $user = $this->User->find('list',['keyField' => 'Email',
    'valueField' => ['Name','Email']]);
    $this->set(compact('user'));

    if ($this->request->is('post')) {
      $email = new Email('default');
      $email->transport('gmail');
      $useremail = $this->request->data['useremail'];
      $subject = $this->request->data['subject'];
      $msg = $this->request->data['message'];
      try {
        $email
             ->transport('gmail')
             ->from(['teregan1996@gmail.com' => 'MuzInterior - Online shop'])
             ->to($useremail)
             ->subject($subject)
              ->emailFormat('html')
             ->viewVars(['msg' => $msg])
             ->send($msg);
      } catch (Exception $e) {
        echo 'Exception : ',  $e->getMessage(), "\n";
      }
      $this->Flash->success(__('Email successfully sended!'));
      return $this->redirect(['action' => 'index']);
    }
  }
}
