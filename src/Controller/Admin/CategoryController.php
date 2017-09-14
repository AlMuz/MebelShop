<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class CategoryController extends AppController
{
  public function index()
  {
      $category = $this->paginate($this->Category);

      $this->set(compact('category'));
      $this->set('_serialize', ['category']);
  }

  public function view($id = null)
  {
    $this->paginate=['limit' => 15
    // 'order' => [
    //     'Category.Title' => 'asc']
      ];

      $category = $this->paginate($this->Category);
      $category = $this->Category->get($id, [
          'contain' => ['Product']
      ]);

      $this->set('category', $category);
      $this->set('_serialize', ['category']);
  }

  //For admin

  public function add()
  {
      $category = $this->Category->newEntity();
      if ($this->request->is('post')) {
          $category = $this->Category->patchEntity($category, $this->request->getData());
          if ($this->Category->save($category)) {
              $this->Flash->success(__('The category has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The category could not be saved. Please, try again.'));
      }
      $this->set(compact('category'));
      $this->set('_serialize', ['category']);
  }

  /**
   * Edit method
   *
   * @param string|null $id Category id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
  public function edit($id = null)
  {
      $category = $this->Category->get($id, [
          'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $category = $this->Category->patchEntity($category, $this->request->getData());
          if ($this->Category->save($category)) {
              $this->Flash->success(__('The category has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The category could not be saved. Please, try again.'));
      }
      $this->set(compact('category'));
      $this->set('_serialize', ['category']);
  }

  /**
   * Delete method
   *
   * @param string|null $id Category id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $category = $this->Category->get($id);
      if ($this->Category->delete($category)) {
          $this->Flash->success(__('The category has been deleted.'));
      } else {
          $this->Flash->error(__('The category could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }



}
