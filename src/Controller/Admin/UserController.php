<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class UserController extends AppController
{

  public function index()
  {
      $this->paginate = [
          'limit' => 10,
      ];
      $user = $this->paginate($this->User);

      $this->set(compact('user'));
  }

  //showing information about chosen user
  public function view($id = null)
  {
      $user = $this->User->get($id, [
          'contain' => []
      ]);

      $this->set('user', $user);
  }

  // editing user information, but administrator can't to edit user password
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
      $country=['Latvia'=>'Latvia','Lithuania'=>'Lithuania','Estonia'=>'Estonia'];
      $this->set('country', $country);
      $this->set(compact('user'));
  }
}
