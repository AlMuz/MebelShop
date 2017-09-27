<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public $paginate = [
  		'limit' => 15
  	];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->set('maintitle', 'Online store - MuzFurn');
        $this->set('currency', 'EUR');


        $this->loadComponent('Auth', [
          'loginAction' => [
            'controller' => 'User',
            'action' => 'login'],
    			'loginRedirect' => ['controller' => 'product', 'action' => 'index'],
    			'logoutRedirect' => '/',
    			'authenticate' => [
    				'Form' => [
    					'fields' => [
    						'username' => 'Login',
    						'password' => 'Password'
    					],
    					'userModel' => 'User'
    				]
    			],
    			'storage' => [
    				'className' => 'Session',
    				'key' => 'Auth.User',
    			]
    		]);
    }

    public function beforeFilter(Event $event)
    {
      //show in prefix admin - admin layout and check access to admin
      if (isset($this->request->params['prefix']) == 'admin') {
        if($this->Auth->user('Root') == 1){
          $this->viewBuilder()->layout('admin');
        } else{
           $this->redirect($this->referer());
           $this->Flash->error(__('You shall not pass!'));
        }
  		} else {
  			$authUser = $this->Auth->user();
          	$this->viewBuilder()->layout('default');
  		}


      //login check
      if($this->Auth->user()){
        $this->set('loggedIn',true);
      }else{
        $this->set('loggedIn',false);
      }

      //admin check
      if($this->Auth->user('Root')){
        $this->set('adminIn',true);
      }else{
        $this->set('adminIn',false);
      }
    }

    public function beforeRender(Event $event)
    {
      $this->loadModel('Category');
      $this->set('cat', $this->Category->find()
      ->limit(10)
      );
    }
}
