<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Automations Controller
 *
 * @property \App\Model\Table\AutomationsTable $Automations
 * @method \App\Model\Entity\Automation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AutomationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People'],
        ];
        $automations = $this->paginate($this->Automations);

        $this->set(compact('automations'));
    }

    /**
     * View method
     *
     * @param string|null $id Automation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $automation = $this->Automations->get($id, [
            'contain' => ['People'],
        ]);

        $this->set(compact('automation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $automation = $this->Automations->newEmptyEntity();
        if ($this->request->is('post')) {
            $automation = $this->Automations->patchEntity($automation, $this->request->getData());
            if ($this->Automations->save($automation)) {
                $this->Flash->success(__('The automation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The automation could not be saved. Please, try again.'));
        }
        $people = $this->Automations->People->find('list', ['limit' => 200])->all();
        $this->set(compact('automation', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Automation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $automation = $this->Automations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $automation = $this->Automations->patchEntity($automation, $this->request->getData());
            if ($this->Automations->save($automation)) {
                $this->Flash->success(__('The automation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The automation could not be saved. Please, try again.'));
        }
        $people = $this->Automations->People->find('list', ['limit' => 200])->all();
        $this->set(compact('automation', 'people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Automation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $automation = $this->Automations->get($id);
        if ($this->Automations->delete($automation)) {
            $this->Flash->success(__('The automation has been deleted.'));
        } else {
            $this->Flash->error(__('The automation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
