<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\SessionHelper;
class PagesController extends AppController
{

  public function index()
  {
     $this->loadModel('Product');
     $this->loadModel('Category');
     $this->loadModel('User');
     $this->loadModel('Material');


     $category= $this->Category->find('all')->count();
     $product= $this->Product->find('all')->count();
     $user= $this->User->find('all')->count();
     $material= $this->Material->find('all')->count();
     $order =  1;

     $this->set('product', $product);
     $this->set('category', $category);
     $this->set('user', $user);
     $this->set('material', $material);
     $this->set('order', $order);
  }

}
