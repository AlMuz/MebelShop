<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class UserController extends AppController
{


  public function index()
  {
      $user = $this->paginate($this->User);

      $this->set(compact('user'));
  }


  public function view($id = null)
  {
      $user = $this->User->get($id, [
          'contain' => []
      ]);

      $this->set('user', $user);

  }


  public function edit($id = null)
  {
      $user = $this->User->get($id, [
          'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $user = $this->User->patchEntity($user, $this->request->getData());
          if ($this->User->save($user)) {
              $this->Flash->success(__('The user has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $this->set(compact('user'));

  }

}
