<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 28/01/2017
 * Time: 18:22
 */

App::uses('AppController', 'Controller');


class UsersRestController extends AppController {

    public $uses = array('User');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'login');
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

}
?>