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
