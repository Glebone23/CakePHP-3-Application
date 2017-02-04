<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Costs Controller
 *
 * @property \App\Model\Table\CostsTable $Costs
 */
class CostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $costs = $this->paginate($this->Costs);

        $this->set(compact('costs'));
        $this->set('_serialize', ['costs']);
    }

    /**
     * View method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => []
        ]);

        $this->set('cost', $cost);
        $this->set('_serialize', ['cost']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesTable = TableRegistry::get('Categories');
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT category FROM categories')->fetchAll('assoc');
        $integer = 1;

        $categories = [];
        while($integer - 1 < count($results)){
            $categories[$integer - 1] = $categoriesTable->get($integer)->category;
            $integer++;
        }
        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);


        $cost = $this->Costs->newEntity();
        if ($this->request->is('post')) {
            $cost = $this->Costs->patchEntity($cost, $this->request->data);
            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }
        $this->set(compact('cost'));
        $this->set('_serialize', ['cost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost = $this->Costs->patchEntity($cost, $this->request->data);
            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }
        $this->set(compact('cost'));
        $this->set('_serialize', ['cost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cost = $this->Costs->get($id);
        if ($this->Costs->delete($cost)) {
            $this->Flash->success(__('The cost has been deleted.'));
        } else {
            $this->Flash->error(__('The cost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function categories(){
        $categoriesTable = TableRegistry::get('Categories');
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT category FROM categories')->fetchAll('assoc');
        $integer = 1;

        $categories = [];
        while($integer - 1 < count($results)){
            $categories[$integer - 1] = $categoriesTable->get($integer)->category;
            $integer++;
        }

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);

        $costs = $this->paginate($this->Costs);

        $this->set(compact('costs'));
        $this->set('_serialize', ['costs']);
    }

    public function dates(){
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT created FROM costs')->fetchAll('assoc');
        $results = json_encode($results);
        $results = json_decode($results);

        for($i = 0; $i < count($results); $i++){
            $results[$i] = date_create($results[$i]->created)->Format('Y-m-d');
        }

        $dates = array_unique($results);
        $dates = array_values($dates);


        $costs = $this->paginate($this->Costs);

        $this->set(compact(['costs', 'dates']));
        $this->set('_serialize', ['costs', 'dates']);
    }
}
