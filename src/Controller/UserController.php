<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UserController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('register','logout');
    }

    public function register()
    {
      $user = $this->User->newEntity();
      if ($this->request->is('post')) {
          $user = $this->User->patchEntity($user, $this->request->getData());
          if ($this->User->save($user)) {
              $this->Flash->success(__('You successfuly registered'));
              return $this->redirect(['controller'=>'user','action' => 'login']);
          }
          $this->Flash->error(__('Error! Please, try again.'));
      }
      $this->set('user', $user);
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('You successfuly logged in'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));

        }
    }

    public function logout()
    {
        $this->Flash->success(__('You logged off'));
        return $this->redirect($this->Auth->logout());
    }


    public function index()
    {


    }


    public function order(){

    }
    public function edit()
    {
      // debug($this->usid);
        // $user = $this->User->get($this->usid, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $user = $this->User->patchEntity($user, $this->request->getData());
        //     if ($this->User->save($user)) {
        //         $this->Flash->success(__('The user has been saved.'));
        //
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }
        // $this->set(compact('user'));
        // $this->set('_serialize', ['user']);
    }
}
