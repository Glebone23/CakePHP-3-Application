<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event){

    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    // Login
    public function login(){
        $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Invalid email or password.'));
            $this->redirect($this->referer());
        }

    }

    // Logout
    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect([$this->Auth->logout(), $this->redirect($this->referer())]);
    }

    public function register(){
        if($this->request->is('post')){
            $name = $this->request->data('name');
            $login = $this->request->data('login');
            $email = $this->request->data('email');
            $phone = $this->request->data('phone');
            $password = $this->request->data('password');
            $password2 = $this->request->data('password2');


            $connection = ConnectionManager::get('default');

            $email_check = $connection->execute('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetchAll('assoc');
            $login_check = $connection->execute('SELECT * FROM users WHERE login = :login', ['login' => $login])->fetchAll('assoc');

            if(!empty($login_check)){
                $error = 'This login is taken.';
                $this->Flash->error(__('This login is taken.'));
                $this->set([
                    'error' =>$error,
                    '_serialize'=> 'error' // this will appear within success of ajax
                ]);
            } else if(!empty($email_check)){
                $this->Flash->error(__('This email is taken.'));
            } else {
                $hash_pass = (new DefaultPasswordHasher)->hash($password);

                $connection = ConnectionManager::get('default');
                $connection->insert('users', [
                    'name' => $name,
                    'login' => $login,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $hash_pass,
                ]);
            }

            $this->redirect($this->redirect($this->referer()));
        }
    }

}
