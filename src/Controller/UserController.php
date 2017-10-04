<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UserController extends AppController
{
    // allow to not authorized users access to register and login pages
    // disallow to use index( profile page), logout(function), order and edit pages if user unauthorized
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('register','login');
        $this->Auth->deny('index','logout','order','edit');

        // setting allowed countries to register
        $country=['Latvia'=>'Latvia','Lithuania'=>'Lithuania','Estonia'=>'Estonia'];
        $this->set('country', $country);
    }

    // user profile
    public function index()
    {
      $query = $this->User->find('all')
      ->where(['User.idUser = ' => $this->Auth->user('idUser')]);
      $this->set('user',$query);

    }

    // Registration page
    public function register()
    {
      if ($this->Auth->user()){
           $this->redirect(['controller'=>'user','action' => 'index']);
       }

      $user = $this->User->newEntity();

      if ($this->request->is('post')) {
          $user = $this->User->patchEntity($user, $this->request->getData());
          // check exists username or not
          $conditions = array(
              'conditions' => array(
                  'Login' => $user->Login
               )
          );
          $result = $this->User->find('list', $conditions);

          if (!$result->count()==0){
            $this->Flash->error(__('This username already exists'));
          }
          // if not exists username -> all right and successfull registration
          else{
            if ($this->User->save($user)) {
                $this->Flash->success(__('You successfuly registered'));
                return $this->redirect(['controller'=>'user','action' => 'login']);
            }
          }
      }


      $this->set('user', $user);
    }

    // login page
    public function login()
    {
        if ($this->Auth->user()){
             $this->redirect(['controller'=>'user','action' => 'index']);
         }
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

    // function to logout user
    public function logout()
    {
        $this->loadComponent('Cart');
        $this->Flash->success(__('You logged off'));
        $this->Cart->clear();
        return $this->redirect($this->Auth->logout());
    }

    public function order(){

    }

    // edit user profile function and page
    public function edit()
    {
        $user = $this->User->get($this->Auth->user('idUser'), [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('New information in profile successfuly saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}
