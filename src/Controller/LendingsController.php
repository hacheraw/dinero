<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lendings Controller
 *
 * @property \App\Model\Table\LendingsTable $Lendings
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LendingsController extends AppController
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
        $lendings = $this->paginate($this->Lendings);

        $this->set(compact('lendings'));
    }

    /**
     * View method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lending = $this->Lendings->get($id, [
            'contain' => ['People'],
        ]);

        $this->set(compact('lending'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($person_id = null, $type = null)
    {
        $lending = $this->Lendings->newEmptyEntity();
        $lending->person_id = $person_id;
        $lending->type = $type;
        if ($this->request->is('post')) {
            $lending = $this->Lendings->patchEntity($lending, $this->request->getData());
            if ($this->Lendings->save($lending)) {
                $this->Flash->success(__('The lending has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        $people = $this->Lendings->People->find('list', ['limit' => 200])->all();
        $types = $this->Lendings::TYPES;
        $this->set(compact('lending', 'people', 'types', 'person_id', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lending = $this->Lendings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lending = $this->Lendings->patchEntity($lending, $this->request->getData());
            if ($this->Lendings->save($lending)) {
                $this->Flash->success(__('The lending has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        $people = $this->Lendings->People->find('list', ['limit' => 200])->all();
        $types = $this->Lendings::TYPES;
        $this->set(compact('lending', 'people', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lending = $this->Lendings->get($id);
        if ($this->Lendings->delete($lending)) {
            $this->Flash->success(__('The lending has been deleted.'));
        } else {
            $this->Flash->error(__('The lending could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
