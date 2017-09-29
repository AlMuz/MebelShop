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

       $category= $this->Category->find('all')->count();
       $product= $this->Product->find('all')->count();
       $user= $this->User->find('all')->count();
      //  $session = $this->request->session();
      //  $session->write('meow',1);
      //  $meow = $session->read('meow');

       $this->set('product', $product);
       $this->set('category', $category);
       $this->set('user', $user);
      //  $this->set('meow', $meow);
      // //  $sesion->destroy();


     }

}
