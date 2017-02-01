<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 28/01/2017
 * Time: 18:22
 */

App::uses('AppController', 'Controller');


class UsersRestController extends AppController {

    public $uses = array('User', 'Item');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'login', 'addItem');
    }

    public function isAuthorized($user = null)
    {
        return true;
    }

    public function index() {
        $users = $this->User->find('all');
        $this->set(array(
            'users' => $users,
            '_serialize' => array('users')
        ));
    }

    public function view($id) {
        $user = $this->User->findById($id);
        $this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));
    }

    public function login() {
        if ($this->User->authenticate($this->request->data)) {
            $logged = "true";
        } else {
            $logged = "false";
        }
        $this->set(array(
            'logged' => $logged,
            '_serialize' => array('logged')
        ));
    }

    public function addItem($username, $item_id) {
        $added = "false";

        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->User->find('first', 
            array('conditions' => array('User.username' => $username), 'fields' => array('User.id')));

        if ($user) {
            // On vérifie que l'item existe
            if ($this->Item->exists($item_id)) {
                // Préparation de la requête
                $this->request->data['User']['id'] = $user['User']['id'];
                $this->request->data['Item']['id'] = $item_id;

                // Exécution de la requête
                if ($this->User->save($this->request->data)) {
                    $added = "true";
                }
            }
        }

        $this->set(array(
            'logged' => $added,
            '_serialize' => array('logged')
        ));
    }

}
?>