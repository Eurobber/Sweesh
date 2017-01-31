<?php
App::uses('AppController', 'Controller');

class WeeshListsRestController extends AppController {

    public $uses = array('WeeshList', 'User');
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index($username) {
        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->User->find('first', array('conditions' => array('User.username' => $username), 'fields' => array('User.id')));

        // Réponse
        $this->set(array(
            'weesh_lists' => $user['WeeshList'],
            '_serialize' => array('weesh_lists')
        ));
    }

    public function add($username) {
        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->User->find('first', array('conditions' => array('User.username' => $username), 'fields' => array('User.id')));

        // On ajoute l'user_id à la requête
        $this->request->data['WeeshList']['user_id'] = $user['User']['id'];

        // Création de la weeshlist
        $this->WeeshList->create();
        if ($this->WeeshList->save($this->request->data)) {
            $added = "true";
        } else {
            $added = "false";
        }

        // Réponse
        $this->set(array(
            'added' => $added,
            '_serialize' => array('added')
        ));
    }
}
?>