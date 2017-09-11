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
        $this->set('maintitle', 'Internet veikals - MuzFurn');

        $this->loadComponent('Security');
        $this->loadComponent('Csrf');

        $this->loadComponent('Auth',[
          'authenticate' => [
                'Basic' => [
                    'fields' => ['username' => 'login', 'password' => 'password'],
                    'userModel' => 'User'
                ],
            ],
            'loginRedirect' => [
                'controller' => 'product',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'product',
                'action' => 'index'
            ]
        ]);
    }

    public function beforeFilter(Event $event)
    {
      $this->Auth->allow(['index', 'view','register','login', 'display','about']);
    }

    public function beforeRender(Event $event)
    {
        $this->loadModel('Category');
        $this->loadModel('Cart');

        $this->set('cat', $this->Category->find()
        ->limit(10)

        );

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
