<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\SessionHelper;
class PagesController extends AppController
{
  // main page in admin panel
  public function index()
  {
     //loading models
     $this->loadModel('Product');
     $this->loadModel('Category');
     $this->loadModel('User');
     $this->loadModel('Material');
     $this->loadModel('Orders');

     //counting information of all interesting information
     $category= $this->Category->find('all')->count();
     $product= $this->Product->find('all')->count();
     $user= $this->User->find('all')->count();
     $material= $this->Material->find('all')->count();
     $order =  $this->Orders->find('all')->count();
     //getting information of ordered orders
     $ordered =  $this->Orders->find('all')
                                   ->where(['Orders.Status =' => '0'])
                                   ->count();
     //getting information of delivered orders  
     $delivered =  $this->Orders->find('all')
                                   ->where(['Orders.Status =' => '1'])
                                   ->count();
     //setting it  to show
     $this->set('product', $product);
     $this->set('category', $category);
     $this->set('user', $user);
     $this->set('material', $material);
     $this->set('order', $order);
     $this->set('ordered', $ordered);
     $this->set('delivered', $delivered);
  }

}
