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
      $this->Auth->allow(['about']);
    }

    public function beforeRender(Event $event)
    {
        $this->loadModel('Category');
        $this->loadModel('Cart');

        $this->set('cat', $this->Category->find()
        ->limit(10)
        );

        //login check
        if($this->request->session()->read('Auth.User')){
          $this->set('loggedIn',true);
        }else{
          $this->set('loggedIn',false);
        }

        //admin check
        if($this->request->session()->read('Auth.User.Root')){
          $this->set('adminIn',true);
        }else{
          $this->set('adminIn',false);
        }
    }
}
