<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    //default for all paginate elements on the page
    public $paginate = [
  		'limit' => 15
  	];
    public $helpers = ['CkEditor.Ck'];

    public function initialize()
    {
        parent::initialize();
        // loading required  components
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        // setting global variables
        $this->set('maintitle', 'Online store | MuzInterior');
        $this->set('currency', 'EUR');

        // auth components helps handle with session allows disalows etc
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
      //show in prefix admin - admin layout and check access to admin panel
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
      // this must be for category menu in navbar
      $this->loadModel('Category');
      $this->set('cat', $this->Category->find('all',[
        'limit'=> 5, 
        'order' => ['Category.title'=> 'asc']
      ]));

      // this part for cart counter
      $session = $this->request->session();
      if($session->read('Shop.Order.quantity')!= null){
        $count = $session->read('Shop.Order.quantity');
      }
      else {
        $count = 0;
      }
      $this->set('count',$count);
    }
}
