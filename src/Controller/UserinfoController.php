<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Userinfo Controller
 *
 * @property \App\Model\Table\UserinfoTable $Userinfo
 *
 * @method \App\Model\Entity\Userinfo[] paginate($object = null, array $settings = [])
 */
class UserinfoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userinfo = $this->paginate($this->Userinfo);

        $this->set(compact('userinfo'));
        $this->set('_serialize', ['userinfo']);
    }

    /**
     * View method
     *
     * @param string|null $id Userinfo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userinfo = $this->Userinfo->get($id, [
            'contain' => []
        ]);

        $this->set('userinfo', $userinfo);
        $this->set('_serialize', ['userinfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userinfo = $this->Userinfo->newEntity();
        if ($this->request->is('post')) {
            $userinfo = $this->Userinfo->patchEntity($userinfo, $this->request->getData());
            if ($this->Userinfo->save($userinfo)) {
                $this->Flash->success(__('The userinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userinfo could not be saved. Please, try again.'));
        }
        $this->set(compact('userinfo'));
        $this->set('_serialize', ['userinfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Userinfo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userinfo = $this->Userinfo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userinfo = $this->Userinfo->patchEntity($userinfo, $this->request->getData());
            if ($this->Userinfo->save($userinfo)) {
                $this->Flash->success(__('The userinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userinfo could not be saved. Please, try again.'));
        }
        $this->set(compact('userinfo'));
        $this->set('_serialize', ['userinfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Userinfo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userinfo = $this->Userinfo->get($id);
        if ($this->Userinfo->delete($userinfo)) {
            $this->Flash->success(__('The userinfo has been deleted.'));
        } else {
            $this->Flash->error(__('The userinfo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
