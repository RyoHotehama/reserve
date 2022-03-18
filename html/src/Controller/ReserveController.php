<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reserve Controller
 *
 * @property \App\Model\Table\ReserveTable $Reserve
 * @method \App\Model\Entity\Reserve[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReserveController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $reserve = $this->paginate($this->Reserve);

        $this->set(compact('reserve'));
    }

    /**
     * View method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserve = $this->Reserve->get($id, [
            'contain' => ['Users', 'Schedules'],
        ]);

        $this->set(compact('reserve'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserve = $this->Reserve->newEmptyEntity();
        if ($this->request->is('post')) {
            $reserve = $this->Reserve->patchEntity($reserve, $this->request->getData());
            if ($this->Reserve->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $users = $this->Reserve->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('reserve', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserve = $this->Reserve->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserve = $this->Reserve->patchEntity($reserve, $this->request->getData());
            if ($this->Reserve->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $users = $this->Reserve->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('reserve', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserve = $this->Reserve->get($id);
        if ($this->Reserve->delete($reserve)) {
            $this->Flash->success(__('The reserve has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
