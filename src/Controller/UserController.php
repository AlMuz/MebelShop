<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UserController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('register','logout');
    }

    public function register()
    {
      $user = $this->User->newEntity();
      if ($this->request->is('post')) {
          $user = $this->User->patchEntity($user, $this->request->getData());
          if ($this->User->save($user)) {
              $this->Flash->success(__('You successfuly registered'));

              return $this->redirect(['controller'=>'user','action' => 'login']);
          }
          $this->Flash->error(__('Error! Please, try again.'));
      }
      $this->set('user', $user);
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('You successfuly logged in'));
                return $this->redirect($this->Auth->redirectUrl());



            }
            $this->Flash->error(__('Invalid username or password, try again'));

        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function index()
    {
      $this->redirect(['action' => 'profile']);

        // $user = $this->paginate($this->User);
        //
        // $this->set(compact('user'));
        // $this->set('_serialize', ['user']);
    }

    public function profile() {

      $id = $this->Auth->user('idUser');
      if (empty($id)) {
        throw new NotFoundException();
      }

      $user = $this->Users->get($id);
      if (empty($user)) {
        throw new NotFoundException();
      }

      if (!empty($this->request->data)) {

        if ($this->request->is('ajax')) {

          $this->request->data['modified_by'] = 'self';

          $save = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'update']);
          if ($this->Users->save($save)) {
            $return = array_keys($this->request->data);
            $return[] = 'status_ok';
            echo json_encode($return);

            $this->Logs->Log($id, 'Users:profile - updated profile', 'success');
            $this->Auth->setUser($save);
            die;
          } else {
            echo json_encode($save->errors());
            die;
          }
        }
      }

      $show_password_text = array(__('Show password'), __('Hide password'));


      $this->set(compact('user', 'show_password_text'));
      $this->set('title_for_layout', __('My Data'));
    }




    //
    // public function add()
    // {
    //     $user = $this->User->newEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->User->patchEntity($user, $this->request->getData());
    //         if ($this->User->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));
    //
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    //     $this->set('_serialize', ['user']);
    // }


    // public function view($id = null)
    // {
    //     $user = $this->User->get($id, [
    //         'contain' => []
    //     ]);
    //
    //     $this->set('user', $user);
    //     $this->set('_serialize', ['user']);
    // }
    //
    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    //
    //
    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id User id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $user = $this->User->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $user = $this->User->patchEntity($user, $this->request->getData());
    //         if ($this->User->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));
    //
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    //     $this->set('_serialize', ['user']);
    // }
    //
    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id User id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->User->get($id);
    //     if ($this->User->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }
    //
    //     return $this->redirect(['action' => 'index']);
    // }
}
